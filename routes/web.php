<?php

use App\Http\Controllers\Api\v1\AppController;
use App\Http\Controllers\Api\v1\PaymentController;
use App\Http\Controllers\Api\v1\PrivatePaymentController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\CourseController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PostController;
use App\Http\Controllers\Site\TopicController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('send/otp', [\App\Http\Controllers\Api\v1\AuthController::class, 'sendOtp'])->name('send-otp');
Route::post('verify/otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('courses', [CourseController::class, 'index'])->name('courses-list');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course-details');
Route::get('users', [UserController::class, 'index'])->name('users-list');
Route::get('user/{id}', [UserController::class, 'show'])->name('user-details');
Route::get('posts', [PostController::class, 'index'])->name('posts-list');
Route::get('post/{id}', [PostController::class, 'show'])->name('post-details');
Route::get('search/{word}', [HomeController::class , 'searchUsers'])->name('search');

Route::group(['middleware' => ['auth']], function() {
    Route::get('profile/update' , [UserController::class , 'edit'])->name('edit-profile');
    Route::post('profile/update' , [UserController::class , 'update'])->name('update-profile');
    Route::get('logout' , [AuthController::class , 'logout'])->name('logout');
    Route::get('user-courses', [CourseController::class, 'index'])->name('user-courses');
    # TODO : refactor this routes with resource controllers
    Route::post('course', [CourseController::class, 'store'])->name('store-course');
    Route::post('update-course/{id}', [CourseController::class, 'update'])->name('update-course');
    Route::get('course', [CourseController::class, 'create'])->name('create-course');
    Route::get('course/{id}/edit', [CourseController::class, 'edit'])->name('edit-course');
    Route::delete('course/{id}', [CourseController::class, 'destroy'])->name('delete-course');
    Route::get('course/{id}/topic', [TopicController::class, 'create'])->name('create-topic');
    Route::post('course/{id}/topic', [TopicController::class, 'store'])->name('store-topic');
    Route::delete('topic/{id}', [TopicController::class, 'destroy'])->name('delete-topic');
    Route::post('topic/{id}', [TopicController::class, 'update'])->name('update-topic');
    Route::get('topic/{id}', [TopicController::class, 'edit'])->name('edit-topic');
    Route::get('user-posts', [PostController::class, 'index'])->name('user-posts');
    Route::get('post', [PostController::class, 'create'])->name('create-post');
    Route::post('post', [PostController::class, 'store'])->name('store-post');
    Route::delete('post/{id}', [PostController::class, 'destroy'])->name('delete-post');
    Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('edit-post');
    Route::post('post/{id}', [PostController::class, 'update'])->name('update-post');
    Route::get('purchase/course/{id}', [\App\Http\Controllers\Site\PaymentController::class, 'purchaseCourse'])->name('purchase-course');
    Route::get('purchase/private/{id}', [\App\Http\Controllers\Site\PaymentController::class, 'purchasePrivate'])->name('purchase-private');
    Route::delete('post/image/{id}', [PostController::class, 'deletePostImage'])->name('delete-post-image');
    Route::get('user-sales', [\App\Http\Controllers\Site\PaymentController::class, 'getUserSales'])->name('user-sales');
    Route::get('user-payments', [\App\Http\Controllers\Site\PaymentController::class, 'getUserPayments'])->name('user-payments');
    Route::get('follow/{user}', [UserController::class, 'follow'])->name('follow');
    Route::get('like/{post}', [PostController::class, 'like'])->name('like');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/link', function () {
    Artisan::call('storage:link');
    dd(Artisan::output());
});



Route::get('/payment-complete', [PaymentController::class, 'paymentComplete']);
Route::get('/private-payment-complete', [PrivatePaymentController::class, 'paymentComplete']);

Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd(Artisan::output());
});

require __DIR__.'/auth.php';
