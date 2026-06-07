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
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-sky-500 mb-6 inline-block font-medium"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    
    <div class="flex items-center gap-3 mb-8">
        <div class="w-12 h-12 bg-sky-50 text-sky-500 rounded-xl flex items-center justify-center text-2xl"><i class="fa-solid fa-globe"></i></div>
        <div>
            <h2 class="text-xl font-extrabold text-slate-800">Kurs Mata Uang</h2>
            <p class="text-xs text-slate-400 font-medium">Update *Real-time* dari API</p>
        </div>
    </div>
    
    <div class="space-y-3">
        <div class="flex justify-between items-center p-4 bg-slate-50 border border-slate-100 rounded-xl">
            <div class="flex items-center gap-3"><span class="text-2xl">🇺🇸</span> <span class="font-bold text-slate-700">1 USD</span></div>
            <span class="font-extrabold text-sky-600">Rp {{ $conversions['USD'] }}</span>
        </div>
        <div class="flex justify-between items-center p-4 bg-slate-50 border border-slate-100 rounded-xl">
            <div class="flex items-center gap-3"><span class="text-2xl">🇪🇺</span> <span class="font-bold text-slate-700">1 EUR</span></div>
            <span class="font-extrabold text-sky-600">Rp {{ $conversions['EUR'] }}</span>
        </div>
        <div class="flex justify-between items-center p-4 bg-slate-50 border border-slate-100 rounded-xl">
            <div class="flex items-center gap-3"><span class="text-2xl">🇨🇳</span> <span class="font-bold text-slate-700">1 CNY</span></div>
            <span class="font-extrabold text-sky-600">Rp {{ $conversions['CNY'] }}</span>
        </div>
        <div class="flex justify-between items-center p-4 bg-slate-50 border border-slate-100 rounded-xl">
            <div class="flex items-center gap-3"><span class="text-2xl">🇸🇬</span> <span class="font-bold text-slate-700">1 SGD</span></div>
            <span class="font-extrabold text-sky-600">Rp {{ $conversions['SGD'] }}</span>
        </div>
        <div class="flex justify-between items-center p-4 bg-slate-50 border border-slate-100 rounded-xl">
            <div class="flex items-center gap-3"><span class="text-2xl">🇦🇺</span> <span class="font-bold text-slate-700">1 AUD</span></div>
            <span class="font-extrabold text-sky-600">Rp {{ $conversions['AUD'] }}</span>
        </div>
        <div class="flex justify-between items-center p-4 bg-slate-50 border border-slate-100 rounded-xl">
            <div class="flex items-center gap-3"><span class="text-2xl">🇲🇾</span> <span class="font-bold text-slate-700">1 MYR</span></div>
            <span class="font-extrabold text-sky-600">Rp {{ $conversions['MYR'] }}</span>
        </div>
    </div>
</div>




</body></html>