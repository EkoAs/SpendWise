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



// Fitur NetMarket
Route::get('/netmarket', [TransactionController::class, 'showNetMarket'])->name('netmarket');
Route::post('/netmarket', [TransactionController::class, 'processNetMarket'])->name('netmarket.process');

// Fitur QRIS
Route::get('/qris', [TransactionController::class, 'showQris'])->name('qris');
Route::post('/qris', [TransactionController::class, 'processQris'])->name('qris.process');

// manual input tagihan
Route::post('/budget', [DashboardController::class, 'storeBudget'])->name('budget.store');
Route::post('/manual-expense', [DashboardController::class, 'storeManualExpense'])->name('expense.store'); // INI BARU

// CRUD Anggaran update and del
Route::post('/budget', [DashboardController::class, 'storeBudget'])->name('budget.store');

// CRUD Anggaran update and del
Route::put('/budget/{id}', [DashboardController::class, 'updateBudget'])->name('budget.update');
    Route::delete('/budget/{id}', [DashboardController::class, 'destroyBudget'])->name('budget.destroy');