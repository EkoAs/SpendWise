<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    // Tampilkan halaman form transfer
    public function showTransfer() {
        return view('transfer');
    }

    // Proses logika transfer
    public function processTransfer(Request $request) {
        $request->validate([
            'destination' => 'required|string',
            'amount' => 'required|numeric|min:20000', // Minimal 20.000
            'pin' => 'required|string'
        ], [
            'amount.min' => 'Minimum transfer adalah Rp 20.000'
        ]);

        $user = Auth::user();

        // 1. Cek apakah PIN benar
        if (!Hash::check($request->pin, $user->pin)) {
            return back()->withErrors(['pin' => 'PIN yang dimasukkan salah!']);
        }

        // 2. Cek apakah saldo mencukupi
        if ($user->balance < $request->amount) {
            return back()->withErrors(['amount' => 'Saldo kamu tidak mencukupi!']);
        }

        // 3. Potong saldo user (Write ke tabel users)
        $user->balance -= $request->amount;
        $user->save();

        // 4. Catat ke log transaksi (Write ke tabel transactions)
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'transfer',
            'amount' => $request->amount,
            'description' => 'Transfer ke nomor ' . $request->destination,
        ]);

        // Kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Transfer Rp ' . number_format($request->amount, 0, ',', '.') . ' berhasil!');
    }



    // ===================================================================== FITUR TOP UP ========================================
    
    public function showTopUp() {
        return view('topup');
    }

    public function processTopUp(Request $request) {
        $request->validate([
            'provider' => 'required|string',
            'phone' => 'required|string',
            'amount' => 'required|numeric|min:10000',
            'pin' => 'required|string'
        ]);

        $user = Auth::user();

        // Cek PIN
        if (!Hash::check($request->pin, $user->pin)) {
            return back()->withErrors(['pin' => 'PIN yang dimasukkan salah!']);
        }

        // Tambah saldo user (Write)
        $user->balance += $request->amount;
        $user->save();

        // Catat ke log transaksi (Write)
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'topup',
            'amount' => $request->amount,
            'description' => 'Top Up ke ' . $request->provider . ' (' . $request->phone . ')',
        ]);

        return redirect()->route('dashboard')->with('success', 'Top Up ' . $request->provider . ' Rp ' . number_format($request->amount, 0, ',', '.') . ' berhasil!');
    }




    // === FITUR BAYAR VA ===
    public function showVa() {
        return view('va');
    }

    public function processVa(Request $request) {
        $request->validate([
            'va_code' => 'required|string',
            'pin' => 'required|string'
        ]);

        $amount = 30000; // Sesuai aturan Poin 2C: Harga selalu set 30k
        $user = Auth::user();

        if (!Hash::check($request->pin, $user->pin)) return back()->withErrors(['pin' => 'PIN salah!']);
        if ($user->balance < $amount) return back()->withErrors(['amount' => 'Saldo tidak mencukupi untuk bayar VA!']);

        $user->balance -= $amount; // Potong saldo
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'va',
            'amount' => $amount,
            'description' => 'Bayar Virtual Account: ' . $request->va_code,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pembayaran VA Rp 30.000 berhasil!');
    }

    // ================================================= FITUR TAGIHAN ==============================================
    public function showBill() {
        return view('bill');
    }

    public function processBill(Request $request) {
        $request->validate([
            'biller' => 'required|string',
            'customer_id' => 'required|string',
            'pin' => 'required|string'
        ]);

        // Sesuai aturan Poin 2E: Harga di-set per kategori
        $prices = [
            'Listrik' => 150000,
            'Air' => 130000,
            'Internet' => 250000,
            'Asuransi' => 100000,
            'Pajak' => 300000,
        ];
        $amount = $prices[$request->biller] ?? 50000; // Default 50k jika tidak ada

        $user = Auth::user();

        if (!Hash::check($request->pin, $user->pin)) return back()->withErrors(['pin' => 'PIN salah!']);
        if ($user->balance < $amount) return back()->withErrors(['amount' => 'Saldo tidak mencukupi untuk bayar tagihan!']);

        $user->balance -= $amount; // Potong saldo
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'bill',
            'amount' => $amount,
            'description' => 'Tagihan ' . $request->biller . ' (' . $request->customer_id . ')',
        ]);

        return redirect()->route('dashboard')->with('success', 'Pembayaran Tagihan ' . $request->biller . ' berhasil!');
    }
}