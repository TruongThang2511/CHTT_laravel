<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);

Route::prefix('shop')->group(function (){
    Route::get('product/{id}', [App\Http\Controllers\Front\ShopController::class, 'show']);
    Route::post('product/{id}', [App\Http\Controllers\Front\ShopController::class, 'postComment']);
    Route::get('', [App\Http\Controllers\Front\ShopController::class, 'index']);
    Route::get('category/{categoryName}', [App\Http\Controllers\Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function (){
    Route::get('add/{id}', [App\Http\Controllers\Front\CartController::class, 'add']);
    Route::get('/', [App\Http\Controllers\Front\CartController::class, 'index']);
    Route::get('delete', [App\Http\Controllers\Front\CartController::class, 'delete']);
    Route::get('update', [App\Http\Controllers\Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function (){
    Route::get('', [App\Http\Controllers\Front\CheckoutController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Front\CheckoutController::class, 'addOrder']);
    Route::get('/result', [App\Http\Controllers\Front\CheckoutController::class, 'result']);

    Route::get('/vnPayCheck', [App\Http\Controllers\Front\CheckoutController::class, 'vnPayCheck']);
});


