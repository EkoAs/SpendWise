<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagihan - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-lg mx-auto mt-10 space-y-6">
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-amber-500 font-medium"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>

    <!-- FORM PINJAM UANG -->
    <div class="bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
        <h2 class="text-xl font-extrabold text-slate-800 mb-1 flex items-center gap-2"><i class="fa-solid fa-hand-holding-dollar text-amber-500"></i> Ajukan Pinjaman</h2>
        <p class="text-xs text-slate-400 font-medium mb-6">Limit maksimal Rp 20.000.000</p>
        
        <form action="{{ route('wallet.loan.borrow') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Pinjaman</label>
                <div class="flex items-center w-full bg-slate-50 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-amber-500 overflow-hidden">
                    <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                    <input type="number" name="amount" max="20000000" class="w-full bg-transparent px-2 py-3 outline-none font-bold text-slate-700" placeholder="Maks. 20 Juta" required>
                </div>
            </div>
            <div>
                <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-amber-500 font-bold text-center tracking-[0.5em]" placeholder="Masukkan PIN" required>
            </div>
            <button type="submit" class="w-full bg-amber-500 text-white font-bold py-3.5 rounded-xl hover:bg-amber-600 transition-colors">Cairkan Pinjaman</button>
        </form>
    </div>

    <!-- FORM BAYAR CICILAN -->
    <div class="bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
        <h2 class="text-xl font-extrabold text-slate-800 mb-6 flex items-center gap-2"><i class="fa-solid fa-money-check-dollar text-slate-500"></i> Bayar Cicilan</h2>
        
        <form action="{{ route('wallet.loan.pay') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Pembayaran</label>
                <div class="flex items-center w-full bg-slate-50 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-slate-500 overflow-hidden">
                    <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                    <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-3 outline-none font-bold text-slate-700" placeholder="Min. 10.000" required>
                </div>
            </div>
            <div>
                <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-slate-500 font-bold text-center tracking-[0.5em]" placeholder="Masukkan PIN" required>
            </div>
            <button type="submit" class="w-full bg-slate-800 text-white font-bold py-3.5 rounded-xl hover:bg-slate-900 transition-colors">Bayar Cicilan</button>
        </form>
    </div>
</div>


</body></html>