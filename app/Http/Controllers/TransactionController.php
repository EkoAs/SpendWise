<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Http;

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



    // === FITUR NETMARKET (PULSA & DATA) ===
    public function showNetMarket() {
        return view('netmarket');
    }

    public function processNetMarket(Request $request) {
        $request->validate([
            'phone' => 'required|string',
            'package' => 'required|string',
            'pin' => 'required|string'
        ]);

        // Harga fixed sesuai pilihan
        $prices = [
            'Pulsa 20.000' => 21000,
            'Pulsa 50.000' => 51000,
            'Kuota 10GB (30 Hari)' => 45000,
            'Kuota 25GB (30 Hari)' => 85000,
            'Kuota Unlimited (7 Hari)' => 35000,
        ];
        $amount = $prices[$request->package] ?? 0;

        $user = Auth::user();

        if (!Hash::check($request->pin, $user->pin)) return back()->withErrors(['pin' => 'PIN salah!']);
        if ($user->balance < $amount) return back()->withErrors(['amount' => 'Saldo tidak mencukupi!']);

        $user->balance -= $amount;
        $user->save();

        // Cari otomatis apakah user punya anggaran bernama 'Internet' atau 'Pulsa'
        $budget = \App\Models\Budget::where('user_id', $user->id)
            ->where(function($q) {
                $q->where('category', 'LIKE', '%Internet%')->orWhere('category', 'LIKE', '%Pulsa%');
            })->first();
        
        if ($budget) {
            $budget->spent_amount += $amount;
            $budget->save();
        }

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'netmarket',
            'amount' => $amount,
            'description' => 'Pembelian ' . $request->package . ' (' . $request->phone . ')',
        ]);

        return redirect()->route('dashboard')->with('success', 'Pembelian ' . $request->package . ' berhasil!');
    }

    // ============================================================= FITUR QRIS ===
    public function showQris() {
        return view('qris');
    }

    public function processQris(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'pin' => 'required|string'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->pin, $user->pin)) return back()->withErrors(['pin' => 'PIN salah!']);
        if ($user->balance < $request->amount) return back()->withErrors(['amount' => 'Saldo tidak mencukupi!']);

        $user->balance -= $request->amount;
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'qris',
            'amount' => $request->amount,
            'description' => 'Pembayaran QRIS Merchant Dummy',
        ]);

        // Mengirim data nominal untuk dijadikan QR di halaman sukses (opsional)
        return redirect()->route('dashboard')->with('success', 'Pembayaran QRIS Rp ' . number_format($request->amount, 0, ',', '.') . ' berhasil!');
    }


    // Tambahkan ini di bagian atas file untuk fitur API Konversi

    // ==========================================
    // UPDATE FITUR BARU SPENDWISE
    // ==========================================

    // 1. Fitur Pinjam (Limit 20 Juta)
    public function borrowLoan(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|max:20000000',
            'pin' => 'required'
        ]);

        $user = Auth::user();

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');

        // Tambah saldo utama & catat hutang (asumsi ada kolom loan_balance di tabel users)
        $user->increment('balance', $request->amount);
        // $user->increment('loan_balance', $request->amount); // Aktifkan jika kolom ini sudah dibuat di database

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'Pinjaman',
            'title' => 'Pencairan Pinjaman SpendWise',
            'amount' => $request->amount,
            'status' => 'Berhasil',
            'description' => 'Pencairan dana pinjaman ke saldo utama. Jatuh tempo: ' . now()->addDays(30)->format('d M Y')
        ]);

        return back()->with('success', 'Pinjaman sebesar Rp ' . number_format($request->amount) . ' berhasil dicairkan!');
    }

    // Fitur Bayar Pinjaman (Bisa dicicil)
    public function payLoan(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'pin' => 'required'
        ]);

        $user = Auth::user();

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');
        if ($user->balance < $request->amount) return back()->with('error', 'Saldo tidak mencukupi untuk bayar cicilan!');

        // Potong saldo
        $user->decrement('balance', $request->amount);
        // $user->decrement('loan_balance', $request->amount); // Aktifkan jika kolom ini ada

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'Bayar Pinjaman',
            'title' => 'Pembayaran Cicilan Pinjaman',
            'amount' => $request->amount,
            'status' => 'Berhasil',
            'description' => 'Pembayaran cicilan pinjaman berhasil dipotong dari saldo.'
        ]);

        return back()->with('success', 'Cicilan pinjaman dibayar: Rp ' . number_format($request->amount));
    }

    // 2. Fitur Asuransi (Sekali bayar 10k/bulan)
    public function payInsurance(Request $request) {
        $request->validate(['pin' => 'required']);
        $user = Auth::user();
        $insuranceFee = 10000;

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');
        if ($user->balance < $insuranceFee) return back()->with('error', 'Saldo tidak mencukupi!');

        $user->decrement('balance', $insuranceFee);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'Asuransi',
            'title' => 'Pembayaran Asuransi (1 Bulan)',
            'amount' => $insuranceFee,
            'status' => 'Berhasil',
            'description' => 'Proteksi aktif hingga ' . now()->addMonth()->format('d M Y')
        ]);

        return back()->with('success', 'Premi asuransi bulan ini berhasil dibayar!');
    }

    // 3. Fitur BPJS (Harga set 150k untuk kelas 1 misal)
    public function payBPJS(Request $request) {
        $request->validate([
            'bpjs_id' => 'required',
            'pin' => 'required'
        ]);

        $user = Auth::user();
        $bpjsFee = 150000; // Contoh tarif tetap kelas 1

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');
        if ($user->balance < $bpjsFee) return back()->with('error', 'Saldo tidak mencukupi!');

        $user->decrement('balance', $bpjsFee);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'BPJS',
            'title' => 'BPJS Kesehatan - ' . $request->bpjs_id,
            'amount' => $bpjsFee,
            'status' => 'Berhasil',
            'description' => 'Iuran bulanan BPJS berhasil dibayar.'
        ]);

        return back()->with('success', 'Iuran BPJS berhasil dibayar!');
    }

    // 4. Transfer Bank Spesifik
    public function transferBank(Request $request) {
        $request->validate([
            'bank_name' => 'required', // BCA, Mandiri, BNI, dll
            'account_number' => 'required',
            'amount' => 'required|numeric|min:10000',
            'pin' => 'required'
        ]);

        $user = Auth::user();

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');
        if ($user->balance < $request->amount) return back()->with('error', 'Saldo tidak mencukupi!');

        $user->decrement('balance', $request->amount);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'Transfer Bank',
            'title' => 'Transfer ke ' . $request->bank_name . ' (' . $request->account_number . ')',
            'amount' => $request->amount,
            'status' => 'Berhasil',
            'description' => 'Transfer antar bank berhasil.'
        ]);

        return back()->with('success', 'Transfer ke ' . $request->bank_name . ' berhasil!');
    }

    // 5. Transfer E-Wallet Spesifik
    public function transferEwallet(Request $request) {
        $request->validate([
            'provider' => 'required', // Gopay, Dana, ShopeePay
            'phone_number' => 'required',
            'amount' => 'required|numeric|min:10000',
            'pin' => 'required'
        ]);

        $user = Auth::user();

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');
        if ($user->balance < $request->amount) return back()->with('error', 'Saldo tidak mencukupi!');

        $user->decrement('balance', $request->amount);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'E-Wallet',
            'title' => 'Top Up ' . $request->provider . ' (' . $request->phone_number . ')',
            'amount' => $request->amount,
            'status' => 'Berhasil',
            'description' => 'Transfer ke dompet digital lain berhasil.'
        ]);

        return back()->with('success', 'Saldo berhasil dikirim ke ' . $request->provider . '!');
    }

    // 6. Tarik Tunai (Indomaret / Alfamart / ATM)
    public function withdrawCash(Request $request) {
        $request->validate([
            'merchant' => 'required', // Indomaret, Alfamart, ATM BCA
            'amount' => 'required|numeric|min:50000',
            'pin' => 'required'
        ]);

        $user = Auth::user();

        if ($user->pin !== $request->pin) return back()->with('error', 'PIN salah!');
        if ($user->balance < $request->amount) return back()->with('error', 'Saldo tidak mencukupi untuk ditarik!');

        $user->decrement('balance', $request->amount);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'Tarik Tunai',
            'title' => 'Tarik Tunai di ' . $request->merchant,
            'amount' => $request->amount,
            'status' => 'Berhasil',
            'description' => 'Penarikan tunai sukses menggunakan token.'
        ]);

        return back()->with('success', 'Silakan ambil uang tunai Anda di kasir/mesin ' . $request->merchant . ' terdekat.');
    }

    // 7. Konversi Mata Uang via API
    public function getCurrencyRates() {
        try {
            // Menggunakan API gratis dari exchangerate-api
            $response = Http::get('https://open.er-api.com/v6/latest/USD');
            $data = $response->json();
            
            // Konversi base USD ke IDR agar kita dapat rasio Rp ke mata uang lain
            $rates = $data['rates'];
            $usdToIdr = $rates['IDR'];
            
            // Format data
            $conversions = [
                'USD' => number_format($usdToIdr, 0, ',', '.'),
                'EUR' => number_format($usdToIdr / $rates['EUR'], 0, ',', '.'),
                'CNY' => number_format($usdToIdr / $rates['CNY'], 0, ',', '.'),
                'SGD' => number_format($usdToIdr / $rates['SGD'], 0, ',', '.'),
                'AUD' => number_format($usdToIdr / $rates['AUD'], 0, ',', '.'),
                'MYR' => number_format($usdToIdr / $rates['MYR'], 0, ',', '.'),
            ];

            // UPDATE: Arahkan ke halaman view khusus Valas
            return view('features.currency', compact('conversions'));
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengambil data mata uang saat ini. Pastikan koneksi internet aktif.');
        }
    }
}