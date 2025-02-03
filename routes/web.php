<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/men', [ProductController::class, 'showMenProducts'])->name('shop.men');
Route::get('/women', [ProductController::class, 'showWomenProducts'])->name('shop.women');
Route::get('/accessory', [ProductController::class, 'showAccessories'])->name('shop.accessory');

Route::get('/blog', function () {return view('blog');})->name('blog');

Route::get('/contact', function () {return view('contact');})->name('contact');

Route::post('/contact', [InquiryController::class, 'submitInquiry'])->name('contact.submit');

Route::prefix('admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.viewproduct');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.addproduct');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.storeproduct');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.editproduct');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('admin.updateproduct');
    Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('admin.deleteproduct');
});

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('product.cart');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('process-payment', [CartController::class, 'processPayment'])->name('process.payment')->middleware('auth');
Route::get('order-confirmation/{paymentId}/{finalTotal}', [CartController::class, 'orderConfirmation'])->name('order.confirmation')->middleware('auth');

Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');



require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';