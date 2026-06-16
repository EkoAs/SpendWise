<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer - SpendWise</title>
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

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative min-h-[550px] flex flex-col justify-between">
        
        <div>
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
                <span class="text-[11px] font-extrabold text-[#60a5fa] bg-[#2563eb]/10 border border-[#2563eb]/30 px-3 py-1 rounded-full uppercase tracking-wider">
                    Kirim Uang
                </span>
            </div>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2.5">
                    <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('transfer.process') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="space-y-2">
                    <label class="block text-[#cbd5e1] text-sm font-semibold">Nomor Tujuan / Rekening</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b]">
                            <i class="fa-solid fa-address-card"></i>
                        </span>
                        <input type="text" name="destination" class="w-full pl-11 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 focus:border-[#3b82f6] focus:bg-[#0f172a]/80 text-white placeholder-[#64748b] rounded-xl focus:outline-none focus:ring-4 focus:ring-[#3b82f6]/25 transition-all text-sm" placeholder="Contoh: 0812xxxx atau 1234xxxx" required>
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label class="block text-[#cbd5e1] text-sm font-semibold">Nominal Transfer</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#3b82f6] font-extrabold text-base sm:text-lg">Rp</span>
                        <input type="number" name="amount" class="w-full pl-12 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 focus:border-[#3b82f6] focus:bg-[#0f172a]/80 text-white font-bold text-lg focus:outline-none focus:ring-4 focus:ring-[#3b82f6]/25 transition-all" placeholder="20000" min="20000" required>
                    </div>
                    <p class="text-[11px] text-[#94a3b8] flex items-center gap-1">
                        <i class="fa-solid fa-info-circle text-[#60a5fa]"></i> Minimum transfer adalah Rp 20.000
                    </p>
                </div>

                <div class="space-y-2 pt-2">
                    <label class="block text-[#cbd5e1] text-sm font-semibold text-center">Konfirmasi PIN Keamanan</label>
                    <input type="password" name="pin" class="w-full px-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 focus:border-[#3b82f6] focus:bg-[#0f172a]/80 text-white tracking-[0.6em] text-center text-xl font-bold rounded-xl focus:outline-none focus:ring-4 focus:ring-[#3b82f6]/25 transition-all placeholder-[#64748b]/50" placeholder="••••••" maxlength="6" inputmode="numeric" required>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-[#2563eb] to-[#4f46e5] hover:from-[#3b82f6] hover:to-[#6366f1] text-white font-bold py-4 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(37,99,235,0.2)] hover:shadow-[0_6px_20px_rgba(37,99,235,0.4)] hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 cursor-pointer text-sm">
                        <i class="fa-solid fa-paper-plane text-xs"></i> Proses Kirim Sekarang
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-6 pt-4 border-t border-[#334155]/20 flex items-center justify-center gap-2 text-[11px] text-[#64748b] font-medium uppercase tracking-wider">
            <i class="fa-solid fa-lock text-[#10b981]"></i> Secured by SpendWise Encryption
        </div>

    </div>

</body>
</html>