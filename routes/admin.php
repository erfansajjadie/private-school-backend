<?php

use App\Http\Controllers\Admin\ProductCotnroller;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.auth.php';


Route::group(['middleware' => 'auth:admin'], function() {
    Route::view('/', 'admin.home')->name('admin.dashboard');
    Route::resource('product', ProductCotnroller::class)->name('*', 'product');
});
