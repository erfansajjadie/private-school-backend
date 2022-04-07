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
        $payments = Payment::with(['user', 'course'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.payment.course-payment', compact('payments'));
    }

    public function getPrivatePayments()
    {
        $payments = PrivatePayment::with(['user', 'buyer'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.payment.private-payment', compact('payments'));
    }
}
