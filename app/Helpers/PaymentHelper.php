<?php

namespace App\Helpers;

use App\Http\Repositories\SupporterRepository;
use App\Models\Course;
use App\Models\Package;
use App\Models\PrivatePayment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentHelper
{


    public static function invoice(Course $course) : string
    {
        $invoice = (new Invoice)->amount($course->price());

        $seller = $course->user;
        $invoice->detail('wages', [
            [
                "iban" => $course->user->sheba,
                "amount" => (int) (($course->price() * 0.782)) * 10,
                "description" => "تسهیم سود فروش از محصول به ". $seller->name
            ]
        ]);


        try {
            $link =  Payment::callbackUrl(env('APP_URL'). '/payment-complete')
                ->purchase(
                $invoice,
                function ($driver, $transactionId) use ($course) {
                    \App\Models\Payment::updateOrCreate([
                        'user_id' => Auth::user()->id,
                        'course_id' => $course->id,
                    ],[
                        'user_id' => Auth::user()->id,
                        'course_id' => $course->id,
                        'owner_id' => $course->user->id,
                        'price' => $course->price(),
                        'discount' => $course->discount,
                        'transaction_id' => $transactionId,
                    ]);
                }
            )->pay()->toJson();

            return json_decode($link, true)['action'];
        } catch (\Exception $e) {
            return  $e;
        }
    }

    public static function complete(\App\Models\Payment $payment)
    {
        try {
            $receipt = Payment::amount($payment->price)
                ->transactionId($payment->transaction_id)
                ->verify();


            $payment->update([
                'status' => 1,
                'transaction_id' => $receipt->getReferenceId()
            ]);

        } catch (InvalidPaymentException $exception) {
            $payment->update(['status' => 2]);
            return view("payments.payment" , ['payment' => $payment]);
        }

        return view("payments.payment" , [
            'payment' => $payment,
        ]);
    }


    public static function invoicePrivate(User $user) : string
    {
        $invoice = (new Invoice)->amount((int) $user->private_price);
        $invoice->detail('wages', [
            [
                "iban" => $user->sheba,
                "amount" => (int) (($user->private_price * 0.782)) * 10,
                "description" => "تسهیم سود فروش از محصول به ". $user->fullname
            ]
        ]);
        try {
            $link =  Payment::callbackUrl(env('APP_URL'). '/private-payment-complete')
                ->purchase(
                    $invoice,
                    function ($driver, $transactionId) use ($user) {
                        \App\Models\PrivatePayment::updateOrCreate([
                            'buyer_id' => Auth::user()->id,
                            'user_id' => $user->id,
                        ],[
                            'buyer_id' => Auth::user()->id,
                            'user_id' => $user->id,
                            'price' => $user->private_price,
                            'transaction_id' => $transactionId,
                        ]);
                    }
                )->pay()->toJson();

            return json_decode($link, true)['action'];
        } catch (\Exception $e) {
            return  $e;
        }
    }

    public static function completePrivate(PrivatePayment $payment)
    {
        try {
            $receipt = Payment::amount($payment->price)
                ->transactionId($payment->transaction_id)
                ->verify();


            $payment->update([
                'status' => 1,
                'transaction_id' => $receipt->getReferenceId()
            ]);

        } catch (InvalidPaymentException $exception) {
            $payment->update(['status' => 2]);
            return view("payments.payment" , ['payment' => $payment]);
        }

        return view("payments.payment" , [
            'payment' => $payment,
        ]);
    }

}
