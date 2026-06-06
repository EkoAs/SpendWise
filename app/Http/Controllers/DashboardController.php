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
        
        return view('dashboard', compact('user', 'transactions', 'budgets'));
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
}