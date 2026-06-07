<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurs Mata Uang - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animasi Kustom untuk Ornamen Melayang */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float 8s ease-in-out infinite reverse; }
    </style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4 font-sans">

    <!-- ================= BACKGROUND DECORATIONS ================= -->
    
    <!-- 1. Watermark SpendWise Raksasa -->
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[12vw] font-black text-slate-200/60 -rotate-12 select-none tracking-tighter">SPENDWISE</h1>
    </div>

    <!-- 2. Ornamen Simbol Keuangan Melayang -->
    <div class="fixed top-[15%] left-[10%] text-7xl opacity-20 blur-[1px] animate-float pointer-events-none z-0 select-none">💲</div>
    <div class="fixed bottom-[15%] right-[10%] text-8xl opacity-20 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none">💶</div>
    <div class="fixed top-[60%] left-[5%] text-6xl opacity-20 blur-[1px] animate-float pointer-events-none z-0 select-none">💴</div>
    <div class="fixed top-[10%] right-[15%] text-7xl opacity-20 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none">💷</div>

    <!-- 3. Glow Blur Warna Sky/Blue -->
    <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 z-0 pointer-events-none"></div>

    <!-- ================= MAIN CONTENT (GLASSMORPHISM) ================= -->
    
    <div class="w-full max-w-lg bg-white/60 backdrop-blur-2xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/80 z-10 relative">
        
        <!-- Tombol Kembali -->
        <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-sky-600 mb-8 inline-block font-bold transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
        </a>
        
        <!-- Header Judul -->
        <div class="flex items-center gap-4 mb-8 bg-white/60 p-4 rounded-2xl border border-white shadow-sm backdrop-blur-md">
            <div class="w-14 h-14 bg-gradient-to-br from-sky-400 to-blue-500 text-white rounded-xl flex items-center justify-center text-2xl shadow-lg shadow-sky-500/30">
                <i class="fa-solid fa-globe"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-slate-800">Kurs Mata Uang</h2>
                <p class="text-sm text-sky-600 font-semibold mt-0.5 flex items-center gap-1">
                    <i class="fa-solid fa-satellite-dish text-xs animate-pulse"></i> Update Real-time
                </p>
            </div>
        </div>
        
        <!-- List Data Mata Uang -->
        <div class="space-y-4">
            
            <!-- USD -->
            <div class="flex justify-between items-center p-5 bg-white/70 border border-white shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:bg-white rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="flex items-center gap-4">
                    <span class="text-4xl filter drop-shadow-sm group-hover:scale-110 transition-transform">🇺🇸</span> 
                    <div>
                        <span class="block font-bold text-slate-800 text-lg leading-tight">USD</span>
                        <span class="text-xs font-semibold text-slate-400">Dolar Amerika</span>
                    </div>
                </div>
                <span class="font-extrabold text-sky-600 text-lg tracking-wide">Rp {{ $conversions['USD'] }}</span>
            </div>

            <!-- EUR -->
            <div class="flex justify-between items-center p-5 bg-white/70 border border-white shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:bg-white rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="flex items-center gap-4">
                    <span class="text-4xl filter drop-shadow-sm group-hover:scale-110 transition-transform">🇪🇺</span> 
                    <div>
                        <span class="block font-bold text-slate-800 text-lg leading-tight">EUR</span>
                        <span class="text-xs font-semibold text-slate-400">Euro</span>
                    </div>
                </div>
                <span class="font-extrabold text-sky-600 text-lg tracking-wide">Rp {{ $conversions['EUR'] }}</span>
            </div>

            <!-- CNY -->
            <div class="flex justify-between items-center p-5 bg-white/70 border border-white shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:bg-white rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="flex items-center gap-4">
                    <span class="text-4xl filter drop-shadow-sm group-hover:scale-110 transition-transform">🇨🇳</span> 
                    <div>
                        <span class="block font-bold text-slate-800 text-lg leading-tight">CNY</span>
                        <span class="text-xs font-semibold text-slate-400">Yuan Tiongkok</span>
                    </div>
                </div>
                <span class="font-extrabold text-sky-600 text-lg tracking-wide">Rp {{ $conversions['CNY'] }}</span>
            </div>

            <!-- SGD -->
            <div class="flex justify-between items-center p-5 bg-white/70 border border-white shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:bg-white rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="flex items-center gap-4">
                    <span class="text-4xl filter drop-shadow-sm group-hover:scale-110 transition-transform">🇸🇬</span> 
                    <div>
                        <span class="block font-bold text-slate-800 text-lg leading-tight">SGD</span>
                        <span class="text-xs font-semibold text-slate-400">Dolar Singapura</span>
                    </div>
                </div>
                <span class="font-extrabold text-sky-600 text-lg tracking-wide">Rp {{ $conversions['SGD'] }}</span>
            </div>

            <!-- AUD -->
            <div class="flex justify-between items-center p-5 bg-white/70 border border-white shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:bg-white rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="flex items-center gap-4">
                    <span class="text-4xl filter drop-shadow-sm group-hover:scale-110 transition-transform">🇦🇺</span> 
                    <div>
                        <span class="block font-bold text-slate-800 text-lg leading-tight">AUD</span>
                        <span class="text-xs font-semibold text-slate-400">Dolar Australia</span>
                    </div>
                </div>
                <span class="font-extrabold text-sky-600 text-lg tracking-wide">Rp {{ $conversions['AUD'] }}</span>
            </div>

            <!-- MYR -->
            <div class="flex justify-between items-center p-5 bg-white/70 border border-white shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:bg-white rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="flex items-center gap-4">
                    <span class="text-4xl filter drop-shadow-sm group-hover:scale-110 transition-transform">🇲🇾</span> 
                    <div>
                        <span class="block font-bold text-slate-800 text-lg leading-tight">MYR</span>
                        <span class="text-xs font-semibold text-slate-400">Ringgit Malaysia</span>
                    </div>
                </div>
                <span class="font-extrabold text-sky-600 text-lg tracking-wide">Rp {{ $conversions['MYR'] }}</span>
            </div>

        </div>

        <!-- Info Footer Card -->
        <div class="mt-8 text-center bg-white/50 py-3 rounded-xl border border-white/60">
            <p class="text-xs text-slate-400 font-medium">Berdasarkan rasio tukar global harian.</p>
        </div>

    </div>

</body>
</html>