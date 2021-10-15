<?php

use App\Http\Controllers\Api\v1\AppController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CourseController;
use App\Http\Controllers\Api\v1\FollowerController;
use App\Http\Controllers\Api\v1\MessageController;
use App\Http\Controllers\Api\v1\PaymentController;
use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\Api\v1\PrivatePaymentController;
use App\Http\Controllers\Api\v1\ProfileController;
use App\Http\Controllers\Api\v1\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function () {
    Route::post('send/otp', [AuthController::class , 'sendOtp']);
    Route::post('verify/otp', [AuthController::class , 'verifyOtp']);
    Route::post('check/version', [AppController::class , 'checkVersion']);


    Route::get('user/followers/{user}', [FollowerController::class, 'getFollowers']);
    Route::get('user/followings/{user}', [FollowerController::class, 'getFollowings']);

    Route::get('categories', [AppController::class , 'getCategories']);



    // routes which needs providing token
    Route::group(['middleware' => ['auth:sanctum']], function() {
        Route::get('profile', [ProfileController::class , 'getProfile']);
        Route::post('profile', [ProfileController::class , 'update']);
        Route::get('follow/{user}', [FollowerController::class , 'follow']);
        Route::get('dashboard', [ProfileController::class , 'getFollowings']);
        Route::get('user/{id}', [ProfileController::class , 'getUserDetails']);
        Route::get('user-payments', [ProfileController::class , 'getPayments']);
        Route::get('user-sales', [ProfileController::class , 'getSales']);
        Route::post('send/message', [MessageController::class , 'store']);
        Route::post('like/{id}', [PostController::class , 'likePost']);
        Route::post('payment/{id}', [PaymentController::class , 'store']);
        Route::post('private-payment/{id}', [PrivatePaymentController::class , 'store']);
        Route::get('search', [AppController::class , 'searchUsers']);
        Route::delete('message/{id}', [MessageController::class , 'destroy']);
        Route::resource('course', CourseController::class);
        Route::resource('post', PostController::class);
        Route::resource('topic', TopicController::class);
    });
});

