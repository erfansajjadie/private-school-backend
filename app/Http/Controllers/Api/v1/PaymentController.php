<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\PaymentHelper;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store($id)
    {
        return [
          'success' => true,
          'data' => PaymentHelper::invoice(Course::findOrFail($id))
        ];
    }

    public function paymentComplete(Request  $request)
    {
        $payment = Payment::firstWhere('transaction_id', $request->Authority);
        if($payment === null) {
            return  'پرداخت یافت نشد';
        }
        return PaymentHelper::complete($payment);
    }
}
