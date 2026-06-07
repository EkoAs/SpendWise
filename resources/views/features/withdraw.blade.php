<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-rose-500 mb-5 inline-block font-medium"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    
    <h2 class="text-2xl font-extrabold text-slate-800 mb-6 flex items-center gap-2">
        <i class="fa-solid fa-money-bill-transfer text-rose-500"></i> Tarik Tunai
    </h2>
    
    <form action="{{ route('wallet.withdraw') }}" method="POST" class="space-y-5">
        @csrf
        
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Lokasi Terdekat</label>
            <div class="space-y-3">
                <label class="cursor-pointer block">
                    <input type="radio" name="merchant" value="Indomaret" class="peer sr-only" required>
                    <div class="p-4 border-2 border-slate-100 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 flex justify-between items-center transition-all">
                        <div class="flex items-center gap-3"><i class="fa-solid fa-store text-blue-600"></i> <span class="font-bold text-slate-700">Indomaret</span></div>
                        <span class="text-xs font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-lg">0.3 km</span>
                    </div>
                </label>
                <label class="cursor-pointer block">
                    <input type="radio" name="merchant" value="Alfamart" class="peer sr-only">
                    <div class="p-4 border-2 border-slate-100 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 flex justify-between items-center transition-all">
                        <div class="flex items-center gap-3"><i class="fa-solid fa-shop text-red-500"></i> <span class="font-bold text-slate-700">Alfamart</span></div>
                        <span class="text-xs font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-lg">0.8 km</span>
                    </div>
                </label>
                <label class="cursor-pointer block">
                    <input type="radio" name="merchant" value="ATM Bersama" class="peer sr-only">
                    <div class="p-4 border-2 border-slate-100 rounded-xl peer-checked:border-teal-500 peer-checked:bg-teal-50 flex justify-between items-center transition-all">
                        <div class="flex items-center gap-3"><i class="fa-solid fa-building-columns text-teal-600"></i> <span class="font-bold text-slate-700">ATM Bersama</span></div>
                        <span class="text-xs font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-lg">1.2 km</span>
                    </div>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Tarik Tunai</label>
            <div class="flex items-center w-full bg-slate-50 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-rose-500 overflow-hidden">
                <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                <input type="number" name="amount" min="50000" class="w-full bg-transparent px-2 py-3 outline-none font-bold text-slate-700" placeholder="Min. 50.000" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
            <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-rose-500 font-bold text-center tracking-[0.5em]" required>
        </div>

        <button type="submit" class="w-full bg-rose-500 text-white font-bold py-3.5 rounded-xl hover:bg-rose-600 transition-colors">Buat Token Tarik Tunai</button>
    </form>
</div>



</body></html>