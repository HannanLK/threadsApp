<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/men', [ProductController::class, 'showMenProducts'])->name('shop.men');
Route::get('/women', [ProductController::class, 'showWomenProducts'])->name('shop.women');


require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
