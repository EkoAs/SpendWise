<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asuransi - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .input-insurance:focus-within {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2) !important;
        }
        /* Animasi Melayang untuk Latar Belakang */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float 8s ease-in-out infinite reverse; }
        
        @keyframes pulseBlue {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        .shield-glow { animation: pulseBlue 2s infinite; }
    </style>
</head>
<body class="bg-[#020617] text-white flex flex-col items-center justify-start min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <!-- ================= BACKGROUND ORBS & FLOATING ICONS ================= -->
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[12vw] font-black text-[#0f172a]/40 -rotate-12 select-none tracking-tighter">PROTECTION</h1>
    </div>

    <!-- Floating Icons Dark Mode -->
    <div class="fixed top-[15%] left-[10%] text-6xl text-[#334155]/40 blur-[1px] animate-float pointer-events-none z-0 select-none"><i class="fa-solid fa-shield-halved"></i></div>
    <div class="fixed bottom-[20%] right-[10%] text-7xl text-[#334155]/30 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none"><i class="fa-solid fa-umbrella"></i></div>
    <div class="fixed top-[60%] left-[5%] text-7xl text-[#334155]/40 blur-[1px] animate-float pointer-events-none z-0 select-none"><i class="fa-solid fa-heart-pulse"></i></div>
    <div class="fixed top-[10%] right-[15%] text-6xl text-[#334155]/30 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none"><i class="fa-solid fa-house-medical"></i></div>

    <!-- Glowing Orbs -->
    <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-[#3b82f6] rounded-full mix-blend-screen filter blur-[120px] opacity-20 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-96 h-96 bg-[#06b6d4] rounded-full mix-blend-screen filter blur-[120px] opacity-15 z-0 pointer-events-none"></div>

    <!-- ================= MAIN CONTAINER ================= -->
    <div class="w-full max-w-md z-10 relative space-y-6">
        
        <!-- Header: Back Button & Logo -->
        @if(!session('success'))
        <div class="flex items-center justify-between bg-[#0f172a]/70 backdrop-blur-md border border-[#334155]/50 px-6 py-4 rounded-[1.5rem] shadow-lg">
            <div class="flex items-center gap-4">
                <a href="{{ url('/dashboard') }}" class="text-[#94a3b8] hover:text-[#3b82f6] transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </a>
                <!-- Logo SpendWise -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="text-base font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                </div>
            </div>
            <!-- Badge -->
            <div class="flex items-center gap-1.5 bg-[#3b82f6]/10 border border-[#3b82f6]/30 px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#60a5fa] animate-pulse"></span>
                <span class="text-[10px] font-extrabold text-[#60a5fa] uppercase tracking-wider">Asuransi</span>
            </div>
        </div>
        @endif

        <!-- Card Container -->
        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50 text-center">
            
            <!-- ====== STATE: SUCCESS (PROTECTION ACTIVE) ====== -->
            @if(session('success'))
                <div class="py-2">
                    <!-- Logo SpendWise (Center) -->
                    <div class="flex justify-center items-center gap-2 mb-8">
                        <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-xl font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                    </div>

                    <div class="w-20 h-20 bg-gradient-to-br from-[#3b82f6] to-[#2563eb] text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-5 shield-glow">
                        <i class="fa-solid fa-shield-check"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-white mb-2">Proteksi Aktif!</h2>
                    <p class="text-[#94a3b8] mb-6 font-medium">{{ session('success') }}</p>
                    
                    <!-- Digital Receipt / Detail Box -->
                    <div class="bg-[#020617]/60 p-5 rounded-2xl mb-8 border border-[#3b82f6]/30 shadow-inner text-left relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#3b82f6]/5 to-transparent pointer-events-none"></div>
                        
                        <div class="flex justify-between items-center mb-4 relative z-10">
                            <span class="text-sm font-bold text-[#64748b]">Layanan</span>
                            <span class="text-sm font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-shield-halved text-[#3b82f6]"></i> Asuransi SpendWise
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-4 relative z-10">
                            <span class="text-sm font-bold text-[#64748b]">Masa Berlaku</span>
                            <span class="text-sm font-bold text-white">30 Hari Kedepan</span>
                        </div>
                        
                        <hr class="border-dashed border-[#334155] my-4 relative z-10">
                        
                        <div class="flex justify-between items-center relative z-10">
                            <span class="text-sm font-bold text-[#64748b]">Total Premi</span>
                            <span class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#3b82f6] to-[#06b6d4]">Rp 10.000</span>
                        </div>
                    </div>

                    <a href="{{ url('/dashboard') }}" class="block w-full bg-gradient-to-r from-[#1e293b] to-[#334155] text-white font-bold py-4 rounded-xl hover:from-[#334155] hover:to-[#475569] transition-all shadow-md border border-[#475569]/50">
                        Kembali ke Dashboard
                    </a>
                </div>

            <!-- ====== STATE: FORM INPUT ====== -->
            @else
                <div class="w-20 h-20 bg-gradient-to-tr from-[#3b82f6] to-[#06b6d4] text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-6 shadow-[0_4px_25px_rgba(59,130,246,0.4)] transform hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-shield-heart"></i>
                </div>
                
                <h2 class="text-2xl font-extrabold text-white mb-3">Asuransi SpendWise</h2>
                <p class="text-[#94a3b8] text-sm mb-8 font-medium leading-relaxed px-2">
                    Pembayaran proteksi bulan ini telah ditetapkan sebesar <strong class="text-[#60a5fa] font-extrabold bg-[#3b82f6]/10 px-2.5 py-1 rounded-md border border-[#3b82f6]/20">Rp 10.000</strong>.
                </p>
                
                @if(session('error'))
                    <div class="p-4 mb-6 text-sm text-[#f87171] rounded-xl bg-[#ef4444]/10 backdrop-blur-sm font-bold border border-[#ef4444]/30 flex items-center gap-3 text-left">
                        <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('wallet.insurance') }}" method="POST" class="space-y-6 text-left">
                    @csrf
                    <!-- Input PIN -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2 text-center">PIN SpendWise</label>
                        <input type="password" name="pin" maxlength="6" inputmode="numeric" class="input-insurance w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl px-4 py-4 outline-none font-bold text-center tracking-[0.6em] transition-all duration-300 text-xl text-white placeholder-[#475569]/50" placeholder="••••••" required>
                    </div>
                    
                    <!-- Submit -->
                    <button type="submit" class="w-full bg-gradient-to-r from-[#3b82f6] to-[#06b6d4] hover:from-[#60a5fa] hover:to-[#22d3ee] text-white font-bold py-4 rounded-xl shadow-[0_4px_15px_rgba(59,130,246,0.2)] hover:shadow-[0_6px_25px_rgba(59,130,246,0.4)] transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-lock text-xs"></i> Bayar Premi Rp 10.000
                    </button>
                </form>
            @endif
        </div>
        
        <!-- Footer Security Note -->
        <div class="text-center pt-2 pb-6">
            <p class="text-[11px] text-[#64748b] font-bold flex items-center justify-center gap-2 uppercase tracking-wider">
                <i class="fa-solid fa-lock text-[#3b82f6]"></i> Secured by SpendWise
            </p>
        </div>

    </div>

</body>
</html>