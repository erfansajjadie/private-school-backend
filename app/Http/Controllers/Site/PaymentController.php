<?php

namespace App\Http\Controllers\Site;

use App\Helpers\PaymentHelper;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function getUserSales()
    {
        $payments = Auth::user()->sales()->with(['user', 'course'])
            ->orderBy('id', 'desc')
            ->get();

        return view('site.payment.sales_list', compact('payments'));
    }

    public function getUserPayments()
    {
        $payments = Auth::user()->payments()->with(['owner', 'course'])
            ->orderBy('id', 'desc')
            ->get();

        return view('site.payment.payments_list', compact('payments'));
    }

    public function purchaseCourse($id)
    {
        $course = Course::findOrFail($id);
        return PaymentHelper::invoice($course, 'web');
    }

    public function purchasePrivate($id)
    {
        return PaymentHelper::invoicePrivate(User::findOrFail($id), 'web');
    }
}
