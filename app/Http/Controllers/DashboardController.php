<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Budget; // Panggil model Budget

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        
        $transactions = Transaction::where('user_id', $user->id)
                                   ->orderBy('created_at', 'desc')
                                   ->take(5)
                                   ->get();

        // Ambil semua data anggaran milik user
        $budgets = Budget::where('user_id', $user->id)->get();
        
        // FITUR BARU: Menyiapkan data untuk Chart.js
        $chartLabels = $budgets->pluck('category');
        $chartSpent = $budgets->pluck('spent_amount');
        $chartLimit = $budgets->pluck('limit_amount');
        
        // Jangan lupa variabel chart-nya dimasukkan ke compact()
        return view('dashboard', compact('user', 'transactions', 'budgets', 'chartLabels', 'chartSpent', 'chartLimit'));
    }

    // Fungsi menyimpan Anggaran Baru (Poin 3D - Write Process)
    public function storeBudget(Request $request) {
        $request->validate([
            'category' => 'required|string|max:50',
            'limit_amount' => 'required|numeric|min:1000'
        ]);

        Budget::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'limit_amount' => $request->limit_amount,
            'spent_amount' => 0 // Awal mula pemakaian masih 0
        ]);

        return redirect()->route('dashboard')->with('success', 'Kategori anggaran berhasil ditambahkan!');
    }

    // FITUR BARU: Input Pengeluaran Manual & Update Grafik
    // ==============================================================FITUR BARU: Input Pengeluaran Manual & Update Grafik 
    public function storeManualExpense(Request $request) {
        $request->validate([
            'budget_id' => 'required|exists:budgets,id',
            'amount' => 'required|numeric|min:1000',
            'description' => 'required|string|max:255'
        ]);

        $budget = Budget::find($request->budget_id);

        // 1. Tambah Pemakaian di Anggaran (Otomatis geser grafik)
        $budget->spent_amount += $request->amount;
        $budget->save();

        // 2. Catat di Log Transaksi sebagai 'pencatatan manual' (opsional agar tetap ada history)
        Transaction::create([
            'user_id' => Auth::id(),
            'type' => 'manual',
            'amount' => $request->amount,
            'description' => 'Catat: ' . $request->description . ' (' . $budget->category . ')',
        ]);

        // Hapus kode pemotongan $user->balance
        return back()->with('success', 'Catatan pengeluaran berhasil ditambahkan ke grafik!');
    }

    // ==========================================================================CRUD Anggaran (Update & Delete)
    // FITUR BARU: Update Limit Anggaran
    public function updateBudget(Request $request, $id) {
        $request->validate([
            'limit_amount' => 'required|numeric|min:1000'
        ]);

        // Cari anggaran milik user yang sedang login
        $budget = Budget::where('user_id', Auth::id())->findOrFail($id);
        $budget->update([
            'limit_amount' => $request->limit_amount
        ]);

        return back()->with('success', 'Limit anggaran berhasil diubah!');
    }

    // ==============================================================FITUR BARU: Hapus Anggaran
    public function destroyBudget($id) {
        $budget = Budget::where('user_id', Auth::id())->findOrFail($id);
        $budget->delete();

        return back()->with('success', 'Anggaran berhasil dihapus!');
    }
}