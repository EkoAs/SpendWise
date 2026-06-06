<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Dashboard (sementara kita buat kosongan untuk tes setelah berhasil login)
Route::get('/dashboard', function () {
    return "Selamat datang di Halaman Utama SpendWise!";
})->name('dashboard')->middleware('auth');