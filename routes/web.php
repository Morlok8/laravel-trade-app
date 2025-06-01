<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return redirect()->route('products.index');//->with('success', 'Заказ создан!');
});

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);