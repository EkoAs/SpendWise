<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseQris - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4 font-sans">

    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[12vw] font-black text-slate-200/60 -rotate-12 select-none tracking-tighter">WISEQRIS</h1>
    </div>

    <div class="fixed top-[15%] left-[10%] text-6xl text-teal-200 opacity-40 transform -rotate-12 pointer-events-none z-0 select-none">
        <i class="fa-solid fa-qrcode"></i>
    </div>
    <div class="fixed bottom-[20%] right-[10%] text-7xl text-emerald-200 opacity-40 transform rotate-12 pointer-events-none z-0 select-none">
        <i class="fa-solid fa-barcode"></i>
    </div>
    <div class="fixed top-[60%] left-[5%] text-5xl text-teal-200 opacity-30 transform rotate-45 pointer-events-none z-0 select-none">
        <i class="fa-solid fa-mobile-screen-button"></i>
    </div>

    <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-96 h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 z-0 pointer-events-none"></div>

    <div class="w-full max-w-md bg-white/70 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white z-10 relative">
        
        <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-teal-600 mb-6 inline-block font-bold transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
        </a>
        
        <div class="flex items-center gap-4 mb-8 bg-white/60 p-4 rounded-2xl border border-white shadow-sm backdrop-blur-md">
            <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-emerald-500 text-white rounded-xl flex items-center justify-center text-2xl shadow-lg shadow-teal-500/30">
                <i class="fa-solid fa-qrcode"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-slate-800">WiseQris</h2>
                <p class="text-sm text-teal-600 font-semibold mt-0.5">Scan & Bayar Instan</p>
            </div>
        </div>

        @if($errors->any()) 
            <div class="bg-red-50/90 backdrop-blur-sm border border-red-200 text-red-800 p-4 rounded-xl mb-6 font-bold flex items-center gap-3 shadow-sm text-sm">
                <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ $errors->first() }}
            </div> 
        @endif

        @if(session('error'))
            <div class="bg-red-50/90 backdrop-blur-sm border border-red-200 text-red-800 p-4 rounded-xl mb-6 font-bold flex items-center gap-3 shadow-sm text-sm">
                <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-50/90 backdrop-blur-sm border border-green-200 text-green-800 p-4 rounded-xl mb-6 font-bold flex items-center gap-3 shadow-sm text-sm">
                <i class="fa-solid fa-circle-check text-lg"></i> {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col items-center mb-8 relative">
            <div class="relative bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-teal-400 to-transparent opacity-50 shadow-[0_0_8px_rgba(45,212,191,0.8)] animate-[pulse_2s_ease-in-out_infinite]"></div>
                
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=SpendWise-Dummy-QR" alt="QRIS Scan" class="w-32 h-32 rounded-lg group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="mt-4 flex items-center gap-2 bg-teal-50 text-teal-700 px-4 py-2 rounded-full border border-teal-100 shadow-inner">
                <i class="fa-solid fa-camera animate-pulse text-sm"></i>
                <span class="text-xs font-extrabold tracking-wider uppercase">Simulator Scanner Aktif</span>
            </div>
        </div>

        <form action="{{ route('qris.process') }}" method="POST" class="space-y-5 text-left">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Bayar</label>
                <div class="flex items-center w-full bg-white/90 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-teal-500 focus-within:border-teal-500 overflow-hidden shadow-inner transition-all">
                    <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                    <input type="number" name="amount" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-slate-800 text-lg" placeholder="Contoh: 50000" required>
                </div>
            </div>

            <div class="mb-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">PIN Keamanan</label>
                <input type="password" name="pin" maxlength="6" class="w-full bg-white/90 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 font-bold text-center tracking-[0.5em] shadow-inner transition-all text-lg" placeholder="••••••" required>
            </div>

            <button type="submit" class="w-full mt-2 bg-gradient-to-r from-teal-500 to-emerald-500 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-teal-500/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> Bayar QRIS Sekarang
            </button>
        </form>
    </div>

</body>
</html>