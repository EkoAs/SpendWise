<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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