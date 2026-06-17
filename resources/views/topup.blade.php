<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .custom-input:focus {
            background-color: rgba(15, 23, 42, 0.9) !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.25) !important;
        }
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(15, 23, 42, 0.2); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(51, 65, 85, 0.8); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #3b82f6; }
        
        /* Animasi sinyal E-Wallet */
        @keyframes walletPulse {
            0% { box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(56, 189, 248, 0); }
            100% { box-shadow: 0 0 0 0 rgba(56, 189, 248, 0); }
        }
        .wallet-animate { animation: walletPulse 2s infinite; }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden p-4 sm:p-6">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#0ea5e9] opacity-20"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#3b82f6] opacity-20"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#10b981] opacity-15"></div>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative my-auto">
        
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-[#334155]/40">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-[#94a3b8] hover:text-[#38bdf8] transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </a>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="text-sm font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                </div>
            </div>
            <div class="flex items-center gap-1.5 bg-[#38bdf8]/10 border border-[#38bdf8]/30 px-3 py-1 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#7dd3fc] wallet-animate"></span>
                <span class="text-[10px] font-extrabold text-[#7dd3fc] uppercase tracking-wider">Top Up</span>
            </div>
        </div>

        @if($errors->any()) 
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div> 
        @endif

        <form action="{{ route('topup.process') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="space-y-3">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Pilih E-Wallet</label>
                <input type="hidden" name="provider" id="providerInput" required>
                
                <div class="grid grid-cols-3 gap-3">
                    <div class="provider-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 rounded-xl p-3 flex flex-col items-center justify-center gap-2 transition-all duration-200" 
                         data-value="DANA" data-color="#118EEA" onclick="selectProvider(this)">
                        <div class="w-8 h-8 rounded-full bg-[#118EEA]/20 flex items-center justify-center">
                            <i class="fa-solid fa-wallet text-[#118EEA] text-sm"></i>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide">DANA</span>
                    </div>

                    <div class="provider-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 rounded-xl p-3 flex flex-col items-center justify-center gap-2 transition-all duration-200" 
                         data-value="GoPay" data-color="#00AA13" onclick="selectProvider(this)">
                        <div class="w-8 h-8 rounded-full bg-[#00AA13]/20 flex items-center justify-center">
                            <i class="fa-solid fa-motorcycle text-[#00AA13] text-sm"></i>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide">GoPay</span>
                    </div>

                    <div class="provider-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 rounded-xl p-3 flex flex-col items-center justify-center gap-2 transition-all duration-200" 
                         data-value="OVO" data-color="#4C3494" onclick="selectProvider(this)">
                        <div class="w-8 h-8 rounded-full bg-[#4C3494]/20 flex items-center justify-center">
                            <i class="fa-solid fa-circle-o text-[#4C3494] text-sm font-bold"></i>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide">OVO</span>
                    </div>

                    <div class="provider-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 rounded-xl p-3 flex flex-col items-center justify-center gap-2 transition-all duration-200" 
                         data-value="ShopeePay" data-color="#EE4D2D" onclick="selectProvider(this)">
                        <div class="w-8 h-8 rounded-full bg-[#EE4D2D]/20 flex items-center justify-center">
                            <i class="fa-solid fa-bag-shopping text-[#EE4D2D] text-sm"></i>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide">Shopee</span>
                    </div>

                    <div class="provider-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 rounded-xl p-3 flex flex-col items-center justify-center gap-2 transition-all duration-200" 
                         data-value="LinkAja" data-color="#E31837" onclick="selectProvider(this)">
                        <div class="w-8 h-8 rounded-full bg-[#E31837]/20 flex items-center justify-center">
                            <i class="fa-solid fa-link text-[#E31837] text-sm"></i>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide">LinkAja</span>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Nomor Tujuan / HP</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b]">
                        <i class="fa-solid fa-address-book text-sm"></i>
                    </span>
                    <input type="text" name="phone" class="custom-input w-full pl-11 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white placeholder-[#64748b] rounded-xl focus:outline-none transition-all text-sm font-medium" placeholder="0812xxxxxx" required>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Nominal Top Up</label>
                <input type="hidden" name="amount" id="amountInput" required>
                
                <div class="grid grid-cols-3 gap-2">
                    <div class="amount-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:border-[#38bdf8] rounded-xl py-3 text-center transition-all" data-value="10000" onclick="selectAmount(this)">
                        <span class="text-xs font-bold text-white">10.000</span>
                    </div>
                    <div class="amount-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:border-[#38bdf8] rounded-xl py-3 text-center transition-all" data-value="20000" onclick="selectAmount(this)">
                        <span class="text-xs font-bold text-white">20.000</span>
                    </div>
                    <div class="amount-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:border-[#38bdf8] rounded-xl py-3 text-center transition-all" data-value="30000" onclick="selectAmount(this)">
                        <span class="text-xs font-bold text-white">30.000</span>
                    </div>
                    <div class="amount-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:border-[#38bdf8] rounded-xl py-3 text-center transition-all" data-value="50000" onclick="selectAmount(this)">
                        <span class="text-xs font-bold text-white">50.000</span>
                    </div>
                    <div class="amount-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:border-[#38bdf8] rounded-xl py-3 text-center transition-all" data-value="100000" onclick="selectAmount(this)">
                        <span class="text-xs font-bold text-white">100.000</span>
                    </div>
                    <div class="amount-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:border-[#38bdf8] rounded-xl py-3 text-center transition-all" data-value="150000" onclick="selectAmount(this)">
                        <span class="text-xs font-bold text-white">150.000</span>
                    </div>
                </div>
            </div>

            <div class="space-y-2 pt-1">
                <label class="block text-[#cbd5e1] text-sm font-semibold text-center">PIN Keamanan</label>
                <input type="password" name="pin" class="custom-input w-full px-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white tracking-[0.6em] text-center text-xl font-bold rounded-xl focus:outline-none transition-all placeholder-[#64748b]/50" placeholder="••••••" maxlength="6" inputmode="numeric" required>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-500 hover:to-cyan-400 text-white font-bold py-4 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(56,189,248,0.2)] hover:shadow-[0_6px_20px_rgba(56,189,248,0.4)] flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane text-xs"></i> Konfirmasi Top Up
                </button>
            </div>
        </form>
    </div>

    <script>
        // Fungsi Pilih E-Wallet (Dengan efek Brand Color)
        function selectProvider(element) {
            let cards = document.querySelectorAll('.provider-card');
            cards.forEach(card => {
                card.style.borderColor = 'rgba(51, 65, 85, 0.7)'; // Reset border
                card.style.backgroundColor = 'rgba(2, 6, 23, 0.5)'; // Reset bg
                card.style.boxShadow = 'none';
            });

            let brandColor = element.getAttribute('data-color');
            element.style.borderColor = brandColor;
            element.style.backgroundColor = `${brandColor}20`; // Hex to transparent (approx 20% opacity)
            element.style.boxShadow = `0 0 15px ${brandColor}40`;

            document.getElementById('providerInput').value = element.getAttribute('data-value');
        }

        // Fungsi Pilih Nominal
        function selectAmount(element) {
            let cards = document.querySelectorAll('.amount-card');
            cards.forEach(card => {
                card.classList.remove('border-[#38bdf8]', 'bg-[#38bdf8]/20', 'shadow-[0_0_15px_rgba(56,189,248,0.2)]');
                card.classList.add('border-[#334155]/70', 'bg-[#020617]/50');
            });

            element.classList.remove('border-[#334155]/70', 'bg-[#020617]/50');
            element.classList.add('border-[#38bdf8]', 'bg-[#38bdf8]/20', 'shadow-[0_0_15px_rgba(56,189,248,0.2)]');

            document.getElementById('amountInput').value = element.getAttribute('data-value');
        }

        // Auto-select pilihan pertama saat load
        document.addEventListener("DOMContentLoaded", () => {
            let firstProvider = document.querySelector('.provider-card');
            let firstAmount = document.querySelector('.amount-card');
            if(firstProvider) selectProvider(firstProvider);
            if(firstAmount) selectAmount(firstAmount);
        });
    </script>
</body>
</html>