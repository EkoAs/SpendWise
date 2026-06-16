<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden overflow-y-auto p-4 sm:p-6">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#2563eb] opacity-30"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#4f46e5] opacity-30"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#059669] opacity-20"></div>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative">
        
        <div class="flex items-center justify-center gap-2.5 mb-8">
            <div class="w-9 h-9 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_10px_15px_-3px_rgba(59,130,246,0.3)]">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <div class="text-xl font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
        </div>

        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-[#334155]/40">
            <div class="w-16 h-16 bg-gradient-to-br from-[#2563eb] to-[#4f46e5] rounded-full flex items-center justify-center text-2xl font-extrabold text-white shadow-xl shadow-blue-500/10 shrink-0">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div class="overflow-hidden">
                <h2 class="text-lg font-bold text-white truncate">{{ auth()->user()->name }}</h2>
                <p class="text-[#94a3b8] text-xs sm:text-sm truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <div class="bg-[#020617]/40 border border-[#3b82f6]/30 p-5 rounded-2xl mb-6 space-y-4">
            
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-slate-800/60 flex items-center justify-center text-slate-400 shrink-0 mt-0.5">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
                <div>
                    <span class="text-[#94a3b8] text-xs font-medium">Nama Lengkap</span>
                    <p class="text-white font-semibold text-sm sm:text-base">{{ auth()->user()->name }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-slate-800/60 flex items-center justify-center text-slate-400 shrink-0 mt-0.5">
                    <i class="fa-solid fa-phone text-sm"></i>
                </div>
                <div>
                    <span class="text-[#94a3b8] text-xs font-medium">No. Handphone</span>
                    <p class="text-white font-semibold text-sm sm:text-base tracking-wide">{{ auth()->user()->phone }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-slate-800/60 flex items-center justify-center text-slate-400 shrink-0 mt-0.5">
                    <i class="fa-solid fa-id-card text-sm"></i>
                </div>
                <div>
                    <span class="text-[#94a3b8] text-xs font-medium">No. KTP (NIK)</span>
                    <p class="text-white font-semibold text-sm sm:text-base tracking-wider">{{ auth()->user()->ktp }}</p>
                </div>
            </div>

            <div class="pt-3 border-t border-slate-800/80 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-[#10b981] text-sm"></i>
                    <span class="text-[#94a3b8] text-xs font-medium">Status Keamanan</span>
                </div>
                <span class="bg-[#10b981]/10 text-[#10b981] text-[11px] font-bold px-2.5 py-1 rounded-full border border-[#10b981]/20 w-fit">
                    PIN Terenkripsi & Aman
                </span>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <a href="{{ url('/dashboard') }}" class="w-full bg-[#1e293b] hover:bg-[#334155] text-white font-bold py-3.5 px-4 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 hover:-translate-y-0.5 shadow-md text-sm decoration-none">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>

            <form action="{{ route('logout') }}" method="POST" class="w-full m-0">
                @csrf
                <button type="submit" class="w-full bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 border border-red-500/20 font-bold py-3.5 px-4 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 text-sm cursor-pointer">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar dari Akun
                </button>
            </form>
        </div>

    </div>

</body>
</html>