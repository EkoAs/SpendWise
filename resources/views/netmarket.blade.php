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
        /* Efek fokus form utama (Purple Glow) */
        .custom-input:focus {
            background-color: rgba(15, 23, 42, 0.9) !important;
            border-color: #a855f7 !important;
            box-shadow: 0 0 0 4px rgba(168, 85, 247, 0.25) !important;
        }
        /* Animasi sinyal berdenyut lembut untuk ikon header */
        @keyframes signalPulse {
            0% { box-shadow: 0 0 0 0 rgba(168, 85, 247, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(168, 85, 247, 0); }
            100% { box-shadow: 0 0 0 0 rgba(168, 85, 247, 0); }
        }
        .signal-animate {
            animation: signalPulse 2s infinite;
        }
        /* Custom Scrollbar Premium untuk List Paket */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.2);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(51, 65, 85, 0.8); 
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a855f7; 
        }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden p-4 sm:p-6">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#3b82f6] opacity-20"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#a855f7] opacity-25"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#6366f1] opacity-20"></div>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative my-auto">
        
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

        <form action="{{ route('netmarket.process') }}" method="POST" class="space-y-5">
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
                <label class="block text-[#cbd5e1] text-sm font-semibold">Pilihan Paket Premium</label>
                
                <input type="hidden" name="package" id="pkgInput" required>
                
                <div class="grid grid-cols-2 gap-3 max-h-48 overflow-y-auto custom-scrollbar pr-1 pb-1">
                    
                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Pulsa 10.000" data-price="11500" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Pulsa 10.000</span>
                    </div>
                    
                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Pulsa 20.000" data-price="21000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Pulsa 20.000</span>
                    </div>

                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Pulsa 50.000" data-price="51000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Pulsa 50.000</span>
                    </div>

                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Pulsa 100.000" data-price="100000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Pulsa 100.000</span>
                    </div>

                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Kuota 5GB (7 Hari)" data-price="25000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Kuota 5GB <span class="text-[9px] text-[#94a3b8] font-normal block">7 Hari</span></span>
                    </div>

                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Kuota 10GB (30 Hari)" data-price="45000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Kuota 10GB <span class="text-[9px] text-[#94a3b8] font-normal block">30 Hari</span></span>
                    </div>

                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Kuota 25GB (30 Hari)" data-price="85000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Kuota 25GB <span class="text-[9px] text-[#94a3b8] font-normal block">30 Hari</span></span>
                    </div>

                    <div class="package-card cursor-pointer border border-[#334155]/70 bg-[#020617]/50 hover:bg-[#1e293b]/60 rounded-xl p-3 transition-all duration-200 text-center flex flex-col items-center justify-center gap-1 group" data-value="Kuota Unlimited (30 Hari)" data-price="150000" onclick="selectPackage(this)">
                        <span class="text-xs font-bold text-white group-hover:text-white transition-colors">Unlimited <span class="text-[9px] text-[#94a3b8] font-normal block">30 Hari</span></span>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Harga Bayar</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#c084fc]">
                        <i class="fa-solid fa-tag text-sm"></i>
                    </span>
                    <input type="text" id="priceDisplay" class="w-full pl-11 pr-4 py-3.5 bg-slate-800/40 border border-slate-700/40 text-[#c084fc] font-extrabold rounded-xl cursor-not-allowed text-base shadow-inner" disabled>
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
    </div>

    <script>
        // Fungsi ketika tombol paket diklik
        function selectPackage(element) {
            // 1. Hapus efek 'Aktif' dari semua tombol
            let cards = document.querySelectorAll('.package-card');
            cards.forEach(card => {
                card.classList.remove('border-[#a855f7]', 'bg-[#a855f7]/20', 'shadow-[0_0_15px_rgba(168,85,247,0.2)]');
                card.classList.add('border-[#334155]/70', 'bg-[#020617]/50');
            });

            // 2. Berikan efek 'Aktif' (Glow Ungu) pada tombol yang dipilih
            element.classList.remove('border-[#334155]/70', 'bg-[#020617]/50');
            element.classList.add('border-[#a855f7]', 'bg-[#a855f7]/20', 'shadow-[0_0_15px_rgba(168,85,247,0.2)]');

            // 3. Masukkan data ke Hidden Input & Update Harga Display
            let packageName = element.getAttribute('data-value');
            let packagePrice = element.getAttribute('data-price');
            
            document.getElementById('pkgInput').value = packageName; // Terkirim ke backend sebagai name="package"
            document.getElementById('priceDisplay').value = 'Rp ' + parseInt(packagePrice).toLocaleString('id-ID');
        }

        // Jalankan pilihan pertama otomatis ketika halaman dimuat
        document.addEventListener("DOMContentLoaded", () => {
            let firstPackage = document.querySelector('.package-card');
            if(firstPackage) {
                selectPackage(firstPackage);
            }
        });
    </script>
</body>
</html>