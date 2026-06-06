<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

// Halaman Utama (nanti diarahkan ke dashboard jika sudah login)
Route::get('/', function () {
    return redirect()->route('login');
});

// Group Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    // Tampilan UI
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/verify', [AuthController::class, 'showVerify'])->name('verify');

    // Proses Form (Submit)
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::post('/verify', [AuthController::class, 'verify'])->name('verify.process');
});

// Ubah route dashboard yang lama menjadi ini:
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Fitur Transaksi
    Route::get('/transfer', [TransactionController::class, 'showTransfer'])->name('transfer');
    Route::post('/transfer', [TransactionController::class, 'processTransfer'])->name('transfer.process');
});



// Fitur Transaksi
Route::get('/transfer', [TransactionController::class, 'showTransfer'])->name('transfer');
Route::post('/transfer', [TransactionController::class, 'processTransfer'])->name('transfer.process');

// Fitur Top Up
Route::get('/topup', [TransactionController::class, 'showTopUp'])->name('topup');
Route::post('/topup', [TransactionController::class, 'processTopUp'])->name('topup.process');


// Fitur Bayar VA
Route::get('/va', [TransactionController::class, 'showVa'])->name('va');
Route::post('/va', [TransactionController::class, 'processVa'])->name('va.process');

// Fitur Tagihan
Route::get('/bill', [TransactionController::class, 'showBill'])->name('bill');
Route::post('/bill', [TransactionController::class, 'processBill'])->name('bill.process');