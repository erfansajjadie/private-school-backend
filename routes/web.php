<?php

use App\Http\Controllers\Api\v1\PaymentController;
use App\Http\Controllers\Api\v1\PrivatePaymentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function () {
    return \App\Models\User::find(1)->createToken('token-name', ['server:update'])->plainTextToken;
});


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
