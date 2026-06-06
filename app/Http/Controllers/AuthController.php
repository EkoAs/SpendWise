<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // === TAMPILAN HALAMAN ===
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function showVerify() {
        if (!session()->has('auth_type')) return redirect()->route('login');
        return view('auth.verify');
    }

    // === PROSES LOGIKA ===

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users',
            'ktp' => 'required|string|unique:users',
            'pin' => 'required|string|min:6|max:6',
        ]);

        // Simpan data di session sementara untuk diverifikasi OTP nanti
        session(['auth_data' => $request->all(), 'auth_type' => 'register']);
        
        return redirect()->route('verify');
    }

    public function login(Request $request) {
        $request->validate([
            'phone' => 'required|string',
            'pin' => 'required|string',
        ]);

        $user = User::where('phone', $request->phone)->first();

        // Cek apakah user ada dan PIN cocok (PIN disimpan dengan sistem Hash Laravel demi keamanan)
        if ($user && Hash::check($request->pin, $user->pin)) {
            session(['auth_data' => ['id' => $user->id], 'auth_type' => 'login']);
            return redirect()->route('verify');
        }

        return back()->withErrors(['phone' => 'Nomor HP atau PIN salah.']);
    }

    public function verify(Request $request) {
        $request->validate(['code' => 'required|string']);

        // Cek OTP Dummy
        if ($request->code !== '000000') {
            return back()->withErrors(['code' => 'Kode verifikasi salah!']);
        }

        $type = session('auth_type');
        $data = session('auth_data');

        if ($type === 'register') {
            // Buat akun baru di database (Write)
            $user = User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'ktp' => $data['ktp'],
                'pin' => Hash::make($data['pin']), // Enkripsi PIN
                'balance' => 0
            ]);
            Auth::login($user);
        } elseif ($type === 'login') {
            // Login user yang sudah ada
            Auth::loginUsingId($data['id']);
        }

        // Hapus session sementara
        session()->forget(['auth_type', 'auth_data']);

        return redirect()->route('dashboard');
    }
}