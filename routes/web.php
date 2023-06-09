<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;



Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('products/{id}/gallery', [ProductController::class, 'gallery'])->name('products.gallery');
        Route::resource('products', ProductController::class);
        Route::resource('product-galleries', ProductGalleryController::class);
        Route::get('transactions/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transactions.status');
        Route::resource('transactions', TransactionController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
