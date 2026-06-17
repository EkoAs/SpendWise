<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WisePinjam - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        /* Fokus input Pinjaman (Amber) */
        .input-borrow:focus-within {
            border-color: #f59e0b !important;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.2) !important;
        }
        /* Fokus input Pembayaran (Emerald) */
        .input-pay:focus-within {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2) !important;
        }
        /* Animasi sinyal WisePinjam */
        @keyframes pulseAmber {
            0% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(245, 158, 11, 0); }
            100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0); }
        }
        .badge-animate { animation: pulseAmber 2s infinite; }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex flex-col items-center justify-start relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <!-- ================= BACKGROUND HOLOGRAM & WATERMARK (DARK MODE) ================= -->
    <!-- Tulisan Background -->
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[11vw] font-black text-[#0f172a]/40 -rotate-12 select-none tracking-tighter">WISEPINJAM</h1>
    </div>

    <!-- OJK Watermark -->
    <div class="fixed top-[8%] left-[5%] pointer-events-none z-0 select-none opacity-20 transform -rotate-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-building-shield text-5xl text-[#334155]"></i>
            <div>
                <h2 class="text-4xl font-extrabold tracking-tighter leading-none text-[#475569]">OJK</h2>
                <p class="text-[10px] font-bold tracking-widest text-[#475569]">OTORITAS JASA KEUANGAN</p>
            </div>
        </div>
    </div>

    <!-- BI Watermark -->
    <div class="fixed bottom-[10%] right-[5%] pointer-events-none z-0 select-none opacity-20 transform rotate-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-landmark-flag text-5xl text-[#334155]"></i>
            <div>
                <h2 class="text-4xl font-extrabold tracking-tighter leading-none text-[#475569]">BI</h2>
                <p class="text-[10px] font-bold tracking-widest text-[#475569]">BANK INDONESIA</p>
            </div>
        </div>
    </div>

    <!-- Orbs Glow -->
    <div class="fixed top-[-10%] right-[-10%] w-96 h-96 bg-[#f59e0b] rounded-full mix-blend-multiply filter blur-[120px] opacity-20 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-96 h-96 bg-[#10b981] rounded-full mix-blend-multiply filter blur-[120px] opacity-15 z-0 pointer-events-none"></div>

    <!-- ================= MAIN CONTAINER ================= -->
    <div class="w-full max-w-lg z-10 relative space-y-6">
        
        <!-- Header: Back Button & Logo -->
        <div class="flex items-center justify-between bg-[#0f172a]/70 backdrop-blur-md border border-[#334155]/50 px-6 py-4 rounded-[1.5rem] shadow-lg">
            <div class="flex items-center gap-4">
                <a href="{{ url('/dashboard') }}" class="text-[#94a3b8] hover:text-[#f59e0b] transition-colors duration-200">
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
            <div class="flex items-center gap-1.5 bg-[#f59e0b]/10 border border-[#f59e0b]/30 px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#fbbf24] badge-animate"></span>
                <span class="text-[10px] font-extrabold text-[#fbbf24] uppercase tracking-wider">WisePinjam</span>
            </div>
        </div>

        <!-- ================= SYSTEM NOTIFICATIONS ================= -->
        @if(session('success'))
            <div class="bg-[#10b981]/10 backdrop-blur-sm border border-[#10b981]/30 text-[#34d399] p-4 rounded-2xl font-semibold flex items-center gap-3 shadow-lg">
                <i class="fa-solid fa-circle-check text-xl shrink-0"></i> 
                <span class="text-sm">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-[#ef4444]/10 backdrop-blur-sm border border-[#ef4444]/30 text-[#f87171] p-4 rounded-2xl font-semibold flex items-center gap-3 shadow-lg">
                <i class="fa-solid fa-circle-exclamation text-xl shrink-0"></i> 
                <span class="text-sm">{{ session('error') }}</span>
            </div>
        @endif

        <!-- ================= KARTU 1: AJUKAN PINJAMAN (AMBER) ================= -->
        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-[#f59e0b] to-[#d97706] text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_4px_15px_rgba(245,158,11,0.3)]">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-white">Ajukan Pinjaman</h2>
                    <p class="text-sm text-[#94a3b8] font-medium">Limit maksimal Rp 20.000.000</p>
                </div>
            </div>
            
            <form action="{{ route('wallet.loan.borrow') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Input Nominal -->
                <div>
                    <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nominal Pinjaman</label>
                    <div class="input-borrow flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                        <span class="pl-4 pr-2 text-[#64748b] font-bold">Rp</span>
                        <input type="number" name="amount" max="20000000" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-white text-lg placeholder-[#475569]" placeholder="Maks. 20 Juta" required>
                    </div>
                </div>
                <!-- Input PIN -->
                <div>
                    <label class="block text-sm font-semibold text-[#cbd5e1] mb-2 text-center">PIN Keamanan</label>
                    <input type="password" name="pin" maxlength="6" inputmode="numeric" class="input-borrow w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl px-4 py-4 outline-none font-bold text-center tracking-[0.6em] transition-all duration-300 text-xl text-white placeholder-[#475569]/50" placeholder="••••••" required>
                </div>
                <!-- Submit -->
                <button type="submit" class="w-full bg-gradient-to-r from-[#f59e0b] to-[#d97706] hover:from-[#fbbf24] hover:to-[#f59e0b] text-white font-bold py-4 rounded-xl shadow-[0_4px_12px_rgba(245,158,11,0.2)] hover:shadow-[0_6px_20px_rgba(245,158,11,0.4)] transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-bolt text-xs"></i> Cairkan Pinjaman
                </button>
            </form>
        </div>

        <!-- ================= KARTU 2: BAYAR CICILAN (EMERALD) ================= -->
        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-[#10b981] to-[#059669] text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_4px_15px_rgba(16,185,129,0.3)]">
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-white">Bayar Cicilan</h2>
                    <p class="text-sm text-[#94a3b8] font-medium">Bebaskan beban tagihanmu</p>
                </div>
            </div>
            
            <form action="{{ route('wallet.loan.pay') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Input Nominal -->
                <div>
                    <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nominal Pembayaran</label>
                    <div class="input-pay flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                        <span class="pl-4 pr-2 text-[#64748b] font-bold">Rp</span>
                        <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-white text-lg placeholder-[#475569]" placeholder="Min. 10.000" required>
                    </div>
                </div>
                <!-- Input PIN -->
                <div>
                    <label class="block text-sm font-semibold text-[#cbd5e1] mb-2 text-center">PIN Keamanan</label>
                    <input type="password" name="pin" maxlength="6" inputmode="numeric" class="input-pay w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl px-4 py-4 outline-none font-bold text-center tracking-[0.6em] transition-all duration-300 text-xl text-white placeholder-[#475569]/50" placeholder="••••••" required>
                </div>
                <!-- Submit -->
                <button type="submit" class="w-full bg-gradient-to-r from-[#10b981] to-[#059669] hover:from-[#34d399] hover:to-[#10b981] text-white font-bold py-4 rounded-xl shadow-[0_4px_12px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.4)] transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-check-double text-xs"></i> Lunas & Bayar Cicilan
                </button>
            </form>
        </div>
        
        <!-- ================= FOOTER ================= -->
        <div class="text-center pt-2 pb-6">
            <p class="text-[11px] text-[#64748b] font-bold flex items-center justify-center gap-2 uppercase tracking-wider">
                <i class="fa-solid fa-shield-halved text-[#10b981]"></i> Diawasi oleh OJK & BI
            </p>
        </div>

    </div>

</body>
</html>