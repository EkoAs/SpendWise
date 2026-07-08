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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Fitur Transaksi
    Route::get('/transfer', [TransactionController::class, 'showTransfer'])->name('transfer');
    Route::post('/transfer', [TransactionController::class, 'processTransfer'])->name('transfer.process');

    
    Route::get('/api/notification-count', [TransactionController::class, 'getNotificationCount'])->name('api.notif.count');
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



// ===========================================================================================================
// 1. ROUTE GET (Untuk membuka halaman fitur dari tombol Dashboard)
Route::get('/feature/loan', function() { return view('features.loan'); })->name('view.loan');
Route::get('/feature/insurance', function() { return view('features.insurance'); })->name('view.insurance');
Route::get('/feature/bpjs', function() { return view('features.bpjs'); })->name('view.bpjs');
Route::get('/feature/transfer-bank', function() { return view('features.transfer_bank'); })->name('view.transfer.bank');
Route::get('/feature/transfer-ewallet', function() { return view('features.transfer_ewallet'); })->name('view.transfer.ewallet');
Route::get('/feature/withdraw', function() { return view('features.withdraw'); })->name('view.withdraw');


// =============================================================================================
// 2. ROUTE POST (Untuk aksi memotong saldo & menjalankan Controller)
Route::post('/wallet/loan/borrow', [TransactionController::class, 'borrowLoan'])->name('wallet.loan.borrow');
Route::post('/wallet/loan/pay', [TransactionController::class, 'payLoan'])->name('wallet.loan.pay');
Route::post('/wallet/insurance', [TransactionController::class, 'payInsurance'])->name('wallet.insurance');
Route::post('/wallet/bpjs', [TransactionController::class, 'payBPJS'])->name('wallet.bpjs');
Route::post('/wallet/transfer/bank', [TransactionController::class, 'transferBank'])->name('wallet.transfer.bank');
Route::post('/wallet/transfer/ewallet', [TransactionController::class, 'transferEwallet'])->name('wallet.transfer.ewallet');
Route::post('/wallet/withdraw', [TransactionController::class, 'withdrawCash'])->name('wallet.withdraw');

// Route GET Khusus API Mata Uang (Karena ini hanya mengambil data)
Route::get('/wallet/currency', [TransactionController::class, 'getCurrencyRates'])->name('wallet.currency');
Route::get('/api/currency-rates', [TransactionController::class, 'getCurrencyRatesApi'])->name('api.currency.rates');


// liat pin/ lupapin
Route::get('/lupa-pin', [App\Http\Controllers\AuthController::class, 'showForgotPin'])->name('forgot.pin');
Route::post('/lupa-pin/verify', [App\Http\Controllers\AuthController::class, 'verifyForgotPin'])->name('forgot.pin.verify');


// Menampilkan halaman profil - hanya untuk pengguna yang sudah login
Route::get('/profile', function () {
    return view('auth.profile');
})->middleware('auth');

// Memproses Logout
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');