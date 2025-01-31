<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});


Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('register', [RegisteredUserController::class, 'create'])->middleware(['auth:admin', 'verified'])->name('admin.register');
    
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

     // Profile Routes
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/addproduct', [ProductController::class, 'create'])->name('addproduct');
    Route::get('/viewproduct', [ProductController::class, 'index'])->name('viewproduct');
    Route::post('/storeproduct', [ProductController::class, 'store'])->name('storeproduct');
    Route::put('/updateproduct/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::delete('/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');

});