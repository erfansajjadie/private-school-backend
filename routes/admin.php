<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.auth.php';


Route::group(['middleware' => 'auth:admin'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('user', UserController::class)->name('*', 'user');
    Route::resource('message', MessageController::class)->name('*', 'message');
    Route::resource('file', FileController::class)->name('*', 'file');
    Route::resource('category', CategoryController::class)->name('*', 'category');
    Route::post('approve/file/{id}', [FileController::class, 'changeStatus'])->name('approve-file');
    Route::post('ban/{id}', [UserController::class, 'ban']);
    Route::get('payments', [PaymentController::class, 'getCoursePayments'])->name('payments');
    Route::get('private/payments', [PaymentController::class, 'getPrivatePayments'])->name('private-payments');
});
