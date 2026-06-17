<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarik Tunai - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .input-withdraw:focus-within {
            border-color: #f43f5e !important;
            box-shadow: 0 0 0 4px rgba(244, 63, 94, 0.2) !important;
        }
        @keyframes pulseRose {
            0% { box-shadow: 0 0 0 0 rgba(244, 63, 94, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(244, 63, 94, 0); }
            100% { box-shadow: 0 0 0 0 rgba(244, 63, 94, 0); }
        }
        .token-glow {
            animation: pulseRose 2s infinite;
        }
    </style>
</head>
<body class="bg-[#020617] text-white flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <!-- ================= BACKGROUND ORBS ================= -->
    <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-[#f43f5e] rounded-full mix-blend-multiply filter blur-[120px] opacity-20 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-96 h-96 bg-[#f97316] rounded-full mix-blend-multiply filter blur-[120px] opacity-15 z-0 pointer-events-none"></div>

    <div class="w-full max-w-lg z-10 relative space-y-6">
        
        <!-- ================= HEADER LOGO & BACK ================= -->
        @if(!session('success'))
        <div class="flex items-center justify-between bg-[#0f172a]/70 backdrop-blur-md border border-[#334155]/50 px-6 py-4 rounded-[1.5rem] shadow-lg mb-4">
            <div class="flex items-center gap-4">
                <a href="{{ url('/dashboard') }}" class="text-[#94a3b8] hover:text-[#f43f5e] transition-colors duration-200">
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
            <div class="flex items-center gap-1.5 bg-[#f43f5e]/10 border border-[#f43f5e]/30 px-3 py-1.5 rounded-full">
                <span class="text-[10px] font-extrabold text-[#fb7185] uppercase tracking-wider">Tarik Tunai</span>
            </div>
        </div>
        @endif

        <!-- ================= MAIN CARD ================= -->
        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50">
            
            <!-- ====== STATE: SUCCESS (TOKEN GENERATED) ====== -->
            @if(session('success'))
                <div class="text-center py-4">
                    <!-- Logo SpendWise (Center) -->
                    <div class="flex justify-center items-center gap-2 mb-8">
                        <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-xl font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                    </div>

                    <div class="w-20 h-20 bg-gradient-to-br from-[#10b981] to-[#059669] text-white rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-[0_4px_20px_rgba(16,185,129,0.4)]">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-white mb-2">Tarik Tunai Berhasil!</h2>
                    <p class="text-[#94a3b8] mb-8 font-medium">{{ session('success') }}</p>
                    
                    <div class="bg-[#020617]/60 p-6 rounded-2xl mb-8 border border-[#f43f5e]/50 shadow-inner border-dashed relative overflow-hidden token-glow">
                        <div class="absolute inset-0 bg-gradient-to-b from-[#f43f5e]/5 to-transparent pointer-events-none"></div>
                        <p class="text-sm text-[#94a3b8] mb-3 font-bold uppercase tracking-wider relative z-10">Kode Token Anda</p>
                        <p class="text-5xl font-mono font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#f43f5e] to-[#fb7185] tracking-[0.2em] relative z-10">{{ rand(100000, 999999) }}</p>
                        <p class="text-xs text-[#fb7185] mt-4 font-medium relative z-10 flex items-center justify-center gap-2">
                            <i class="fa-regular fa-clock"></i> Berikan kode ini ke kasir. Berlaku 1 Jam.
                        </p>
                    </div>

                    <a href="{{ url('/dashboard') }}" class="block w-full bg-gradient-to-r from-[#1e293b] to-[#334155] text-white font-bold py-4 rounded-xl hover:from-[#334155] hover:to-[#475569] transition-all shadow-md border border-[#475569]/50">
                        Kembali ke Dashboard
                    </a>
                </div>

            <!-- ====== STATE: FORM INPUT ====== -->
            @else
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-gradient-to-br from-[#f43f5e] to-[#e11d48] text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_4px_15px_rgba(244,63,94,0.3)]">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-white">Tarik Tunai</h2>
                        <p class="text-sm text-[#94a3b8] font-medium">Cairkan saldo di merchant terdekat</p>
                    </div>
                </div>

                @if(session('error'))
                    <div class="p-4 mb-6 text-sm text-[#f87171] rounded-xl bg-[#ef4444]/10 backdrop-blur-sm font-bold border border-[#ef4444]/30 flex items-center gap-3">
                        <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('wallet.withdraw') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Pilihan Merchant -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-3">Pilih Lokasi Terdekat</label>
                        <div class="space-y-3">
                            <!-- Indomaret -->
                            <label class="cursor-pointer block">
                                <input type="radio" name="merchant" value="Indomaret" class="peer sr-only" required>
                                <div class="p-4 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#3b82f6] peer-checked:bg-[#3b82f6]/10 flex justify-between items-center transition-all duration-200">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-8 bg-white rounded flex items-center justify-center p-1 border border-slate-200">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Logo_Indomaret.png" alt="Indomaret" class="max-h-full max-w-full object-contain">
                                        </div>
                                        <span class="font-bold text-white">Indomaret</span>
                                    </div>
                                    <span class="text-xs font-bold text-[#94a3b8] bg-[#0f172a] border border-[#334155] px-3 py-1.5 rounded-lg">0.3 km</span>
                                </div>
                            </label>

                            <!-- Alfamart -->
                            <label class="cursor-pointer block">
                                <input type="radio" name="merchant" value="Alfamart" class="peer sr-only">
                                <div class="p-4 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#ef4444] peer-checked:bg-[#ef4444]/10 flex justify-between items-center transition-all duration-200">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-8 bg-white rounded flex items-center justify-center p-1 border border-slate-200">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Alfamart_logo.svg" alt="Alfamart" class="max-h-full max-w-full object-contain">
                                        </div>
                                        <span class="font-bold text-white">Alfamart</span>
                                    </div>
                                    <span class="text-xs font-bold text-[#94a3b8] bg-[#0f172a] border border-[#334155] px-3 py-1.5 rounded-lg">0.8 km</span>
                                </div>
                            </label>

                            <!-- ATM Bersama -->
                            <label class="cursor-pointer block">
                                <input type="radio" name="merchant" value="ATM Bersama" class="peer sr-only">
                                <div class="p-4 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#14b8a6] peer-checked:bg-[#14b8a6]/10 flex justify-between items-center transition-all duration-200">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-8 bg-white rounded flex items-center justify-center p-1 border border-slate-200">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/ATM_Bersama_logo.svg/1024px-ATM_Bersama_logo.svg.png" alt="ATM Bersama" class="max-h-full max-w-full object-contain">
                                        </div>
                                        <span class="font-bold text-white">ATM Bersama</span>
                                    </div>
                                    <span class="text-xs font-bold text-[#94a3b8] bg-[#0f172a] border border-[#334155] px-3 py-1.5 rounded-lg">1.2 km</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Input Nominal -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nominal Tarik Tunai</label>
                        <div class="input-withdraw flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                            <span class="pl-5 pr-2 text-[#64748b] font-bold text-lg">Rp</span>
                            <input type="number" name="amount" min="50000" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-white text-lg placeholder-[#475569]" placeholder="Min. 50.000" required>
                        </div>
                    </div>

                    <!-- Input PIN -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2 text-center">PIN SpendWise</label>
                        <input type="password" name="pin" maxlength="6" inputmode="numeric" class="input-withdraw w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl px-4 py-4 outline-none font-bold text-center tracking-[0.6em] transition-all duration-300 text-xl text-white placeholder-[#475569]/50" placeholder="••••••" required>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full bg-gradient-to-r from-[#f43f5e] to-[#e11d48] hover:from-[#fb7185] hover:to-[#f43f5e] text-white font-bold py-4 rounded-xl shadow-[0_4px_12px_rgba(244,63,94,0.2)] hover:shadow-[0_6px_20px_rgba(244,63,94,0.4)] transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-qrcode text-sm"></i> Buat Token Tarik Tunai
                    </button>
                </form>
            @endif
        </div>
    </div>
</body>
</html>