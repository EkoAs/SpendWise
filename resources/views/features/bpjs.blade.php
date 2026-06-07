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

<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-emerald-500 mb-6 inline-block font-medium"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    
    <div class="flex items-center gap-3 mb-6">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center text-2xl"><i class="fa-solid fa-kit-medical"></i></div>
        <div>
            <h2 class="text-xl font-extrabold text-slate-800">BPJS Kesehatan</h2>
            <p class="text-xs text-slate-400 font-medium">Iuran Kelas 1: Rp 150.000 / Bulan</p>
        </div>
    </div>
    
    <form action="{{ route('wallet.bpjs') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Virtual Account / ID Peserta</label>
            <input type="number" name="bpjs_id" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500 font-semibold" placeholder="Ketik nomor BPJS" required>
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">PIN Verifikasi</label>
            <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500 font-bold text-center tracking-[0.5em]" placeholder="******" required>
        </div>
        <button type="submit" class="w-full bg-emerald-500 text-white font-bold py-3.5 rounded-xl hover:bg-emerald-600 transition-colors">Bayar Tagihan</button>
    </form>
</div>


</body></html>