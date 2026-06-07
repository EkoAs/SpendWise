<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarik Tunai - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-rose-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>

    <div class="w-full max-w-lg bg-white/70 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white z-10">
        
        @if(session('success'))
            <div class="text-center py-4">
                <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-inner">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Tarik Tunai Berhasil!</h2>
                <p class="text-slate-600 mb-8 font-medium">{{ session('success') }}</p>
                
                <div class="bg-white/80 p-5 rounded-2xl mb-8 border border-slate-200 shadow-sm border-dashed">
                    <p class="text-sm text-slate-500 mb-2 font-bold uppercase tracking-wide">Kode Token Anda</p>
                    <p class="text-4xl font-mono font-bold text-rose-600 tracking-[0.2em]">{{ rand(100000, 999999) }}</p>
                    <p class="text-xs text-rose-400 mt-3 font-medium">*Berikan kode ini ke kasir. Berlaku 1 Jam.</p>
                </div>

                <a href="{{ url('/dashboard') }}" class="block w-full bg-slate-800 text-white font-bold py-4 rounded-xl hover:bg-slate-900 transition-all shadow-md">
                    Kembali ke Dashboard
                </a>
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-rose-600 mb-6 inline-block font-bold transition-colors">
                <i class="fa-solid fa-arrow-left mr-1"></i> Batal
            </a>
            
            <h2 class="text-3xl font-extrabold text-slate-800 mb-8 flex items-center gap-3">
                <div class="bg-rose-100 text-rose-500 p-3 rounded-xl"><i class="fa-solid fa-money-bill-transfer"></i></div>
                Tarik Tunai
            </h2>

            @if(session('error'))
                <div class="p-4 mb-6 text-sm text-red-800 rounded-xl bg-red-50/80 backdrop-blur-sm font-bold border border-red-200 flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                </div>
            @endif
            
            <form action="{{ route('wallet.withdraw') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Lokasi Terdekat</label>
                    <div class="space-y-3">
                        <label class="cursor-pointer block">
                            <input type="radio" name="merchant" value="Indomaret" class="peer sr-only" required>
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 flex justify-between items-center transition-all shadow-sm">
                                <div class="flex items-center gap-3"><i class="fa-solid fa-store text-blue-600 text-lg"></i> <span class="font-bold text-slate-700">Indomaret</span></div>
                                <span class="text-xs font-bold text-slate-500 bg-white shadow-sm border border-slate-100 px-3 py-1.5 rounded-lg">0.3 km</span>
                            </div>
                        </label>
                        <label class="cursor-pointer block">
                            <input type="radio" name="merchant" value="Alfamart" class="peer sr-only">
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 flex justify-between items-center transition-all shadow-sm">
                                <div class="flex items-center gap-3"><i class="fa-solid fa-shop text-red-500 text-lg"></i> <span class="font-bold text-slate-700">Alfamart</span></div>
                                <span class="text-xs font-bold text-slate-500 bg-white shadow-sm border border-slate-100 px-3 py-1.5 rounded-lg">0.8 km</span>
                            </div>
                        </label>
                        <label class="cursor-pointer block">
                            <input type="radio" name="merchant" value="ATM Bersama" class="peer sr-only">
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-teal-500 peer-checked:bg-teal-50 flex justify-between items-center transition-all shadow-sm">
                                <div class="flex items-center gap-3"><i class="fa-solid fa-building-columns text-teal-600 text-lg"></i> <span class="font-bold text-slate-700">ATM Bersama</span></div>
                                <span class="text-xs font-bold text-slate-500 bg-white shadow-sm border border-slate-100 px-3 py-1.5 rounded-lg">1.2 km</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Tarik Tunai</label>
                    <div class="flex items-center w-full bg-white/80 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-rose-500 focus-within:border-rose-500 overflow-hidden shadow-inner transition-all">
                        <span class="pl-5 pr-2 text-slate-400 font-bold text-lg">Rp</span>
                        <input type="number" name="amount" min="50000" class="w-full bg-transparent px-2 py-4 outline-none font-bold text-slate-800 text-lg" placeholder="Min. 50.000" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500 font-bold text-center tracking-[0.5em] text-lg shadow-inner transition-all" placeholder="••••••" required>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-rose-500 to-rose-600 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-rose-500/30 transition-all transform hover:-translate-y-0.5">Buat Token Tarik Tunai</button>
            </form>
        @endif
    </div>
</body>
</html>