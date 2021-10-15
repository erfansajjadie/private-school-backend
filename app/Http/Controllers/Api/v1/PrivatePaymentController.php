<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\PaymentHelper;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PrivatePayment;
use App\Models\User;
use Illuminate\Http\Request;

class PrivatePaymentController extends Controller
{
    public function store($id)
    {
        return [
            'success' => true,
            'data' => PaymentHelper::invoicePrivate(User::findOrFail($id))
        ];
    }

    public function paymentComplete(Request  $request)
    {
        $payment = PrivatePayment::firstWhere('transaction_id', $request->Authority);
        if($payment === null) {
            return  'پرداخت یافت نشد';
        }
        return PaymentHelper::completePrivate($payment);
    }
}
