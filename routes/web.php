<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Guest Routes
Route::middleware('guest')->group(function () {
   Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
   Route::post('/login', [AuthController::class, 'login']); 
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    // Transaction Routes
    Route::get('/riwayat-transaksi', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/data-keluar-masuk', [TransactionController::class, 'stockReport'])->name('transactions.stock');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});
