<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetMarket - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        /* Efek fokus form (Purple Glow) */
        .custom-input:focus, .custom-select:focus {
            background-color: rgba(15, 23, 42, 0.9) !important;
            border-color: #a855f7 !important;
            box-shadow: 0 0 0 4px rgba(168, 85, 247, 0.25) !important;
        }
        /* Menyembunyikan panah bawaan browser untuk Select */
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        /* Animasi sinyal berdenyut lembut untuk ikon */
        @keyframes signalPulse {
            0% { box-shadow: 0 0 0 0 rgba(168, 85, 247, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(168, 85, 247, 0); }
            100% { box-shadow: 0 0 0 0 rgba(168, 85, 247, 0); }
        }
        .signal-animate {
            animation: signalPulse 2s infinite;
        }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden overflow-y-auto p-4 sm:p-6">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#3b82f6] opacity-20"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#a855f7] opacity-25"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#6366f1] opacity-20"></div>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative">
        
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-[#334155]/40">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-[#94a3b8] hover:text-[#a855f7] transition-colors duration-200">
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
            <div class="flex items-center gap-1.5 bg-[#a855f7]/10 border border-[#a855f7]/30 px-3 py-1 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#c084fc] signal-animate"></span>
                <span class="text-[10px] font-extrabold text-[#c084fc] uppercase tracking-wider">NetMarket</span>
            </div>
        </div>

        @if($errors->any()) 
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div> 
        @endif

        <form action="{{ route('netmarket.process') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Nomor HP</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b]">
                        <i class="fa-solid fa-mobile-screen-button text-sm"></i>
                    </span>
                    <input type="text" name="phone" class="custom-input w-full pl-11 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white placeholder-[#64748b] rounded-xl focus:outline-none transition-all text-sm font-medium" placeholder="0812xxxxxx" required>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Pilih Paket</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b] z-10">
                        <i class="fa-solid fa-wifi text-sm"></i>
                    </span>
                    <select name="package" id="pkgSelect" class="custom-select w-full pl-11 pr-10 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white rounded-xl focus:outline-none transition-all text-sm font-medium cursor-pointer relative z-0" onchange="updatePrice()" required>
                        <option value="Pulsa 20.000" data-price="21000" class="bg-[#0f172a] text-white">Pulsa 20.000</option>
                        <option value="Pulsa 50.000" data-price="51000" class="bg-[#0f172a] text-white">Pulsa 50.000</option>
                        <option value="Kuota 10GB (30 Hari)" data-price="45000" class="bg-[#0f172a] text-white">Kuota 10GB (30 Hari)</option>
                        <option value="Kuota 25GB (30 Hari)" data-price="85000" class="bg-[#0f172a] text-white">Kuota 25GB (30 Hari)</option>
                        <option value="Kuota Unlimited (7 Hari)" data-price="35000" class="bg-[#0f172a] text-white">Kuota Unlimited (7 Hari)</option>
                    </select>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#64748b] pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </span>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Harga Bayar</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#c084fc]">
                        <i class="fa-solid fa-tag text-sm"></i>
                    </span>
                    <input type="text" id="priceDisplay" value="Rp 21.000" class="w-full pl-11 pr-4 py-3.5 bg-slate-800/40 border border-slate-700/40 text-[#c084fc] font-extrabold rounded-xl cursor-not-allowed text-base shadow-inner" disabled>
                </div>
            </div>

            <div class="space-y-2 pt-1">
                <label class="block text-[#cbd5e1] text-sm font-semibold text-center">PIN Kamu</label>
                <input type="password" name="pin" class="custom-input w-full px-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white tracking-[0.6em] text-center text-xl font-bold rounded-xl focus:outline-none transition-all placeholder-[#64748b]/50" placeholder="••••••" maxlength="6" inputmode="numeric" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-bold py-4 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(147,51,234,0.2)] hover:shadow-[0_6px_20px_rgba(147,51,234,0.4)] hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 cursor-pointer text-sm">
                    <i class="fa-solid fa-bolt text-xs"></i> Beli Sekarang
                </button>
            </div>
        </form>

        <div class="mt-6 pt-4 border-t border-[#334155]/20 flex items-center justify-center gap-2 text-[11px] text-[#64748b] font-medium uppercase tracking-wider">
            <i class="fa-solid fa-check-circle text-[#a855f7]"></i> Koneksi Provider Langsung
        </div>

    </div>

    <script>
        function updatePrice() {
            let select = document.getElementById('pkgSelect');
            let price = select.options[select.selectedIndex].getAttribute('data-price');
            document.getElementById('priceDisplay').value = 'Rp ' + parseInt(price).toLocaleString('id-ID');
        }
    </script>
</body>
</html>