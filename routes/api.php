<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::post('/cart/add', [CartController::class, 'add']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::post('/process-payment', [CartController::class, 'processPayment']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/products/men', [ProductController::class, 'getMenProducts']);
Route::get('/products/women', [ProductController::class, 'getWomenProducts']);
Route::get('/products/{id}', [ProductController::class, 'getProductDetails']);