<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .input-ewallet:focus-within {
            border-color: #8b5cf6 !important;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.2) !important;
        }
        /* Animasi Melayang untuk Ikon Keuangan/Wallet */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float 8s ease-in-out infinite reverse; }
    </style>
</head>
<body class="bg-[#020617] text-white flex flex-col items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[12vw] font-black text-[#0f172a]/40 -rotate-12 select-none tracking-tighter">WALLET</h1>
    </div>

    <div class="fixed top-[15%] left-[10%] text-6xl text-[#334155]/40 blur-[1px] animate-float pointer-events-none z-0 select-none"><i class="fa-solid fa-wallet"></i></div>
    <div class="fixed bottom-[20%] right-[10%] text-7xl text-[#334155]/30 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none"><i class="fa-solid fa-mobile-screen-button"></i></div>
    <div class="fixed top-[60%] left-[5%] text-7xl text-[#334155]/40 blur-[1px] animate-float pointer-events-none z-0 select-none"><i class="fa-solid fa-coins"></i></div>
    <div class="fixed top-[10%] right-[15%] text-6xl text-[#334155]/30 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none"><i class="fa-solid fa-credit-card"></i></div>

    <div class="fixed top-[-10%] right-[-10%] w-96 h-96 bg-[#a855f7] rounded-full mix-blend-screen filter blur-[120px] opacity-20 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-96 h-96 bg-[#d946ef] rounded-full mix-blend-screen filter blur-[120px] opacity-15 z-0 pointer-events-none"></div>

    <div class="w-full max-w-lg z-10 relative space-y-6">

        @if(!session('success'))
        <div class="flex items-center justify-between bg-[#0f172a]/70 backdrop-blur-md border border-[#334155]/50 px-6 py-4 rounded-[1.5rem] shadow-lg">
            <div class="flex items-center gap-4">
                <a href="{{ url('/dashboard') }}" class="text-[#94a3b8] hover:text-[#a855f7] transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </a>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="text-base font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                </div>
            </div>
            <div class="flex items-center gap-1.5 bg-[#a855f7]/10 border border-[#a855f7]/30 px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#c084fc] animate-pulse"></span>
                <span class="text-[10px] font-extrabold text-[#c084fc] uppercase tracking-wider">E-WALLET</span>
            </div>
        </div>
        @endif

        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50">
            
            @if(session('success'))
                <div class="text-center py-2">
                    <div class="flex justify-center items-center gap-2 mb-8">
                        <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-xl font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                    </div>

                    <div class="w-20 h-20 bg-gradient-to-br from-[#a855f7] to-[#7e22ce] text-white rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-[0_4px_20px_rgba(168,85,247,0.4)]">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-white mb-2">Top Up Berhasil!</h2>
                    
                    <div class="bg-[#020617]/60 p-5 rounded-2xl mb-8 border border-[#334155]/50 shadow-inner mt-6 border-dashed relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#a855f7]/5 to-transparent pointer-events-none"></div>

                        <p class="text-sm font-bold text-[#cbd5e1] text-center mb-4 relative z-10">{{ session('success') }}</p>
                        <hr class="border-dashed border-[#334155] mb-4 relative z-10">
                        <div class="flex justify-between items-center mb-3 relative z-10">
                            <span class="text-sm font-bold text-[#64748b]">Tanggal</span>
                            <span class="text-sm font-bold text-white">{{ now()->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center relative z-10">
                            <span class="text-sm font-bold text-[#64748b]">Status</span>
                            <span class="text-xs font-extrabold text-[#c084fc] bg-[#a855f7]/10 border border-[#a855f7]/20 px-2.5 py-1 rounded-md tracking-widest">SUKSES</span>
                        </div>
                    </div>

                    <a href="{{ url('/dashboard') }}" class="block w-full bg-gradient-to-r from-[#1e293b] to-[#334155] text-white font-bold py-4 rounded-xl hover:from-[#334155] hover:to-[#475569] transition-all shadow-md border border-[#475569]/50">
                        Kembali ke Dashboard
                    </a>
                </div>

            @else
                <div class="flex items-center gap-4 mb-8 bg-[#a855f7]/10 p-4 rounded-2xl border border-[#a855f7]/20 relative overflow-hidden">
                    <i class="fa-solid fa-bolt absolute -right-4 -bottom-4 text-6xl text-[#a855f7]/10 -rotate-12"></i>
                    
                    <div class="w-14 h-14 bg-gradient-to-br from-[#a855f7] to-[#7e22ce] text-white rounded-xl flex items-center justify-center text-2xl shadow-[0_4px_15px_rgba(168,85,247,0.3)] relative z-10">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="relative z-10">
                        <h2 class="text-xl font-extrabold text-white">Top Up E-Wallet</h2>
                        <p class="text-sm text-[#94a3b8] font-medium mt-0.5">Isi ulang instan tanpa biaya admin</p>
                    </div>
                </div>

                @if(session('error'))
                    <div class="p-4 mb-6 text-sm text-[#f87171] rounded-xl bg-[#ef4444]/10 backdrop-blur-sm font-bold border border-[#ef4444]/30 flex items-center gap-3">
                        <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="p-4 mb-6 text-sm text-[#f87171] rounded-xl bg-[#ef4444]/10 backdrop-blur-sm font-bold border border-[#ef4444]/30">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('wallet.transfer.ewallet') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-3">Pilih Provider</label>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="provider" value="Gopay" class="peer sr-only" required>
                                <div class="p-3 bg-[#020617]/50 border border-[#334155]/70 rounded-xl peer-checked:border-[#22c55e] peer-checked:bg-[#22c55e]/10 text-center font-bold text-[#64748b] peer-checked:text-[#22c55e] transition-all duration-300 hover:border-[#22c55e]/50">
                                    <div class="text-xs sm:text-sm">Gopay</div>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="provider" value="DANA" class="peer sr-only">
                                <div class="p-3 bg-[#020617]/50 border border-[#334155]/70 rounded-xl peer-checked:border-[#3b82f6] peer-checked:bg-[#3b82f6]/10 text-center font-bold text-[#64748b] peer-checked:text-[#3b82f6] transition-all duration-300 hover:border-[#3b82f6]/50">
                                    <div class="text-xs sm:text-sm">DANA</div>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="provider" value="ShopeePay" class="peer sr-only">
                                <div class="p-3 bg-[#020617]/50 border border-[#334155]/70 rounded-xl peer-checked:border-[#f97316] peer-checked:bg-[#f97316]/10 text-center font-bold text-[#64748b] peer-checked:text-[#f97316] transition-all duration-300 hover:border-[#f97316]/50">
                                    <div class="text-xs sm:text-sm">Shopee</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nomor HP / Akun</label>
                        <div class="input-ewallet flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                            <span class="pl-4 pr-2 text-[#64748b]"><i class="fa-solid fa-mobile-screen"></i></span>
                            <input type="number" name="phone_number" class="w-full bg-transparent px-2 py-4 outline-none font-bold text-white text-lg placeholder-[#475569]" placeholder="Contoh: 0812345678" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nominal Top Up</label>
                        <div class="input-ewallet flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                            <span class="pl-5 pr-2 font-bold text-[#a855f7] bg-[#a855f7]/10 py-1.5 px-3 rounded-md ml-2 text-sm border border-[#a855f7]/20">Rp</span>
                            <input type="number" name="amount" min="10000" class="w-full bg-transparent px-3 py-4 outline-none font-bold text-white text-lg placeholder-[#475569]" placeholder="Min. 10.000" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2 text-center">PIN SpendWise</label>
                        <input type="password" name="pin" maxlength="6" inputmode="numeric" class="input-ewallet w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl px-4 py-4 outline-none font-bold text-center tracking-[0.6em] transition-all duration-300 text-xl text-white placeholder-[#475569]/50" placeholder="••••••" required>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-[#a855f7] to-[#7e22ce] hover:from-[#c084fc] hover:to-[#a855f7] text-white font-bold py-4 rounded-xl shadow-[0_4px_15px_rgba(168,85,247,0.2)] hover:shadow-[0_6px_25px_rgba(168,85,247,0.4)] transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2 mt-4">
                        <i class="fa-solid fa-paper-plane"></i> Top Up Sekarang
                    </button>
                </form>
            @endif
        </div>
        
        <div class="text-center pt-2 pb-6">
            <p class="text-[11px] text-[#64748b] font-bold flex items-center justify-center gap-2 uppercase tracking-wider">
                <i class="fa-solid fa-shield-check text-[#a855f7]"></i> Secured by SpendWise
            </p>
        </div>

    </div>

</body>
</html>