<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Download;
use App\Models\Payment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users_count = User::all()->count();
        $total_payments = Utils::format_price(Payment::where('status', 1)->sum('price'));
        $courses_count = Course::all()->count();
        $posts_count = Post::all()->count();
        $downloads_count = Download::all()->count();
        $visits_count = Download::all()->sum('count');
        $downloads = Download::orderBy('id', 'desc')->take(20)->get();

        $download_labels = [
            'ورژن',
            'سیستم عامل',
            'شناسه دستگاه',
            'برند',
            'نام دستگاه',
            'تعداد بازدید'
        ];

        return view('admin.home',
            compact('users_count', 'total_payments', 'courses_count',
                'posts_count', 'downloads_count', 'visits_count', 'downloads', 'download_labels'));
    }
}
