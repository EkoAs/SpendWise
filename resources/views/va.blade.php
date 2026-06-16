<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar VA - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        /* Style kustom untuk melembutkan transisi fokus input */
        .custom-input:focus {
            background-color: rgba(15, 23, 42, 0.8) !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.25) !important;
        }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden overflow-y-auto p-4 sm:p-6">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#2563eb] opacity-30"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#4f46e5] opacity-30"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#059669] opacity-20"></div>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative">
        
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-[#334155]/40">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-[#94a3b8] hover:text-[#3b82f6] transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </a>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="text-sm font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                </div>
            </div>
            <span class="text-[10px] font-extrabold text-[#34d399] bg-[#059669]/10 border border-[#059669]/30 px-3 py-1 rounded-full uppercase tracking-wider">
                Virtual Account
            </span>
        </div>

        @if($errors->any()) 
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div> 
        @endif

        <form action="{{ route('va.process') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Kode VA dari App Lain</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b]">
                        <i class="fa-solid fa-hashtag text-sm"></i>
                    </span>
                    <input type="text" name="va_code" class="custom-input w-full pl-11 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white placeholder-[#64748b] rounded-xl focus:outline-none transition-all text-sm font-medium" placeholder="1234567890" required>
                </div>
            </div>
            
            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Total Pembayaran</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                        <i class="fa-solid fa-wallet text-sm"></i>
                    </span>
                    <input type="text" value="Rp 30.000" class="w-full pl-11 pr-4 py-3.5 bg-slate-800/40 border border-slate-700/40 text-slate-400 font-bold rounded-xl cursor-not-allowed text-base" disabled>
                </div>
            </div>

            <div class="space-y-2 pt-1">
                <label class="block text-[#cbd5e1] text-sm font-semibold text-center">Konfirmasi PIN Kamu</label>
                <input type="password" name="pin" class="custom-input w-full px-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white tracking-[0.6em] text-center text-xl font-bold rounded-xl focus:outline-none transition-all placeholder-[#64748b]/50" placeholder="••••••" maxlength="6" inputmode="numeric" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-[#059669] to-[#10b981] hover:from-[#10b981] hover:to-[#34d399] text-white font-bold py-4 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.4)] hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 cursor-pointer text-sm">
                    <i class="fa-solid fa-receipt text-xs"></i> Bayar Sekarang
                </button>
            </div>
        </form>

        <div class="mt-6 pt-4 border-t border-[#334155]/20 flex items-center justify-center gap-2 text-[11px] text-[#64748b] font-medium uppercase tracking-wider">
            <i class="fa-solid fa-shield-check text-[#10b981]"></i> Verified Bank Virtual Account
        </div>

    </div>

</body>
</html>