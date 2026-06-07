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


<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100 text-center">
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-blue-500 mb-6 flex justify-center font-medium"><i class="fa-solid fa-arrow-left mr-2 mt-1"></i> Kembali</a>
    
    <div class="w-20 h-20 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-4"><i class="fa-solid fa-shield-heart"></i></div>
    <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Asuransi SpendWise</h2>
    <p class="text-slate-500 text-sm mb-8 font-medium">Pembayaran proteksi bulan ini telah ditetapkan sebesar <strong class="text-slate-700">Rp 10.000</strong>.</p>
    
    <form action="{{ route('wallet.insurance') }}" method="POST" class="space-y-4 text-left">
        @csrf
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
            <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500 font-bold text-center tracking-[0.5em]" placeholder="******" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3.5 rounded-xl hover:bg-blue-600 transition-colors">Bayar Rp 10.000</button>
    </form>
</div>
</body></html>  