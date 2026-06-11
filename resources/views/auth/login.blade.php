<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Animasi background orbs */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
    </style>
</head>
<body class="bg-slate-950 min-h-screen flex items-center justify-center relative overflow-hidden p-4">

    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-40 animate-blob"></div>
        <div class="absolute bottom-[-20%] left-[-10%] w-96 h-96 bg-emerald-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative z-10 w-full max-w-5xl bg-slate-900/60 backdrop-blur-2xl border border-slate-700/50 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] overflow-hidden flex flex-col md:flex-row-reverse">
        
        <div class="w-full md:w-5/12 bg-gradient-to-br from-slate-800/80 to-slate-900/80 p-10 flex flex-col justify-between border-b md:border-b-0 md:border-l border-slate-700/50">
            
            <div class="flex items-center gap-3 justify-end md:justify-start">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-2xl font-extrabold text-white tracking-tight">Spend<span class="text-blue-500">Wise</span></span>
            </div>

            <div class="mt-12 mb-12 text-right md:text-left">
                <h1 class="text-3xl lg:text-4xl font-bold text-white leading-tight mb-4">
                    Selamat Datang <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Kembali!</span>
                </h1>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Masuk untuk memantau arus kas, mengecek limit anggaran, dan mengendalikan keuanganmu hari ini dengan presisi.
                </p>
            </div>

            <div class="text-right md:text-left">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4">Berlisensi & Diawasi Oleh</p>
                <div class="flex items-center justify-end md:justify-start gap-4 mb-6 opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
                    <div class="flex items-center gap-1">
                        <div class="w-6 h-6 border-2 border-slate-300 rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-slate-300 rounded-full"></div>
                        </div>
                        <span class="text-slate-300 font-bold text-sm tracking-widest">OJK</span>
                    </div>
                    <div class="flex items-center gap-1 border-l border-slate-600 pl-4">
                        <span class="text-slate-300 font-black text-sm italic">B I</span>
                    </div>
                    <div class="flex items-center gap-1 border-l border-slate-600 pl-4">
                        <span class="text-slate-300 font-bold text-sm">LPS</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 justify-end md:justify-start opacity-70">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Enkripsi End-to-End 256-bit</span>
                </div>
            </div>
        </div>

        <div class="w-full md:w-7/12 p-10 lg:p-14 flex flex-col justify-center">
            
            <div class="mb-8 text-center md:text-left">
                <h2 class="text-2xl font-bold text-white mb-2">Masuk ke Akunmu</h2>
                <p class="text-slate-400 text-sm">Silakan masukkan No. HP dan PIN kamu yang terdaftar.</p>
            </div>
            
            @if($errors->any())
                <div class="bg-rose-500/10 border border-rose-500/50 text-rose-400 p-4 rounded-xl mb-6 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2 ml-1">No. Handphone</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <input type="text" name="phone" class="w-full pl-11 pr-4 py-3 bg-slate-950/50 border border-slate-700/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" placeholder="08123456789" required>
                    </div>
                </div>

                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2 ml-1 flex justify-between items-center">
                        <span>PIN Keamanan</span>
                        <a href="#" class="text-xs text-blue-400 hover:text-blue-300 transition-colors">Lupa PIN?</a>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" name="pin" class="w-full pl-11 pr-4 py-3 bg-slate-950/50 border border-slate-700/50 rounded-xl text-white placeholder-slate-500 tracking-[0.5em] focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="6" placeholder="******" required>
                    </div>
                </div>

                <button type="submit" class="w-full mt-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-3.5 px-4 rounded-xl shadow-[0_0_20px_rgba(37,99,235,0.3)] hover:shadow-[0_0_25px_rgba(37,99,235,0.5)] transform hover:-translate-y-0.5 transition-all duration-200">
                    Masuk ke SpendWise
                </button>
            </form>
            
            <p class="text-center text-sm text-slate-400 mt-8">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-emerald-400 font-bold hover:text-emerald-300 hover:underline transition-colors">Register Sekarang</a>
            </p>
            
        </div>
    </div>

</body>
</html>