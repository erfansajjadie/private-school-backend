<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PrivatePayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getCoursePayments()
    {
        $payments = Payment::orderBy('id', 'desc')->paginate(10);

        return view('admin.payment.course-payments');
    }

    public function getPrivatePayments()
    {
        $payments = PrivatePayment::orderBy('id', 'desc')->paginate(10);

        return view('admin.payment.private-payments');
    }
}
