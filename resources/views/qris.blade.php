<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseQris - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-input:focus {
            background-color: rgba(15, 23, 42, 0.8) !important;
            border-color: #0d9488 !important;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.25) !important;
        }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden overflow-y-auto p-4 sm:p-6">

    <!-- ================= BACKGROUND WATERMARK & ORBS ================= -->
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0 overflow-hidden">
        <h1 class="text-[14vw] font-black text-[#1e293b]/15 -rotate-12 select-none tracking-tighter">WISEQRIS</h1>
    </div>
    
    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#0d9488] opacity-25"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#10b981] opacity-20"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#2563eb] opacity-15"></div>
    </div>

    <!-- Decorative Floating Icons -->
    <div class="fixed top-[15%] left-[10%] text-5xl text-teal-500/10 transform -rotate-12 pointer-events-none z-0 select-none hidden md:block">
        <i class="fa-solid fa-qrcode"></i>
    </div>
    <div class="fixed bottom-[20%] right-[10%] text-6xl text-emerald-500/10 transform rotate-12 pointer-events-none z-0 select-none hidden md:block">
        <i class="fa-solid fa-barcode"></i>
    </div>

    <!-- ================= MAIN CARD (DARK GLASSMORPHISM) ================= -->
    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative">
        
        <!-- Header: Back Button + Logo Andalan Kiri Atas -->
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-[#334155]/40">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-[#94a3b8] hover:text-[#0d9488] transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </a>
                <!-- Logo Petir Andalan -->
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="text-sm font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                </div>
            </div>
            <!-- Badge Fitur -->
            <span class="text-[10px] font-extrabold text-[#2dd4bf] bg-[#0d9488]/10 border border-[#0d9488]/30 px-3 py-1 rounded-full uppercase tracking-wider">
                WiseQRIS
            </span>
        </div>

        <!-- ================= SYSTEM NOTIFICATIONS ================= -->
        @if($errors->any()) 
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-5 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div> 
        @endif

        @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-5 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-4 rounded-xl mb-5 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-check text-emerald-500 shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- ================= RESPONSIVE QR CODE SECTION ================= -->
        <div class="flex flex-col items-center mb-6 text-center">
            <div class="relative bg-white p-4 rounded-2xl shadow-xl border border-slate-700/30 group overflow-hidden">
                <!-- Glowing Scan Effect Line -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#0d9488] to-transparent shadow-[0_0_12px_#0d9488] animate-[pulse_2s_ease-in-out_infinite]"></div>
                
                <!-- QR Image (Responsive Sizing) -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=SpendWise-Dummy-QR" alt="QRIS Scan" class="w-32 h-32 sm:w-40 sm:h-40 md:w-44 md:h-44 rounded-lg group-hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Action: Buka Kamera Button & Simulator Badge -->
            <div class="mt-4 flex flex-col items-center gap-2.5 w-full px-4">
                <button type="button" id="btn-scan" class="w-full bg-[#1e293b]/60 hover:bg-[#334155]/80 border border-[#334155] text-slate-200 text-xs font-bold py-2.5 px-4 rounded-xl transition-all flex items-center justify-center gap-2 cursor-pointer shadow-sm">
                    <i class="fa-solid fa-camera text-[#2dd4bf]"></i> Buka Kamera di Ponsel Anda
                </button>
                <div class="flex items-center gap-1.5 text-[11px] text-slate-400 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    <span>Simulator Scanner Active</span>
                </div>
            </div>
        </div>

        <!-- ================= INPUT FORM ================= -->
        <form action="{{ route('qris.process') }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Input: Nominal -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-[#cbd5e1]">Nominal Bayar</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#0d9488] font-extrabold text-base">Rp</span>
                    <input type="number" name="amount" class="custom-input w-full pl-12 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white font-extrabold text-lg rounded-xl focus:outline-none transition-all placeholder-[#64748b]/40" placeholder="Contoh: 50000" required>
                </div>
            </div>

            <!-- Input: PIN Keamanan -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-[#cbd5e1] text-center">PIN Keamanan</label>
                <input type="password" name="pin" maxlength="6" inputmode="numeric" class="custom-input w-full px-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white tracking-[0.6em] text-center text-xl font-bold rounded-xl focus:outline-none transition-all placeholder-[#64748b]/50" placeholder="••••••" required>
            </div>

            <!-- Tombol Submit (Teal to Emerald Gradient) -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-gradient-to-r from-[#0d9488] to-[#10b981] hover:from-[#14b8a6] hover:to-[#059669] text-white font-bold py-4 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(13,148,136,0.2)] hover:shadow-[0_6px_20px_rgba(13,148,136,0.4)] hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 cursor-pointer text-sm">
                    <i class="fa-solid fa-wallet text-xs"></i> Bayar QRIS Sekarang
                </button>
            </div>
        </form>

        <!-- Guard Secure Encryption Footer -->
        <div class="mt-6 pt-4 border-t border-[#334155]/20 flex items-center justify-center gap-2 text-[11px] text-[#64748b] font-medium uppercase tracking-wider">
            <i class="fa-solid fa-shield-halved text-[#0d9488]"></i> QRIS Standar Internasional Terenkripsi
        </div>
    </div>

    <!-- ================= MODERN POP-UP MODAL (JAVASCRIPT BINDED) ================= -->
    <div id="camera-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-[#0f172a] border border-[#334155] p-6 rounded-2xl max-w-xs w-full text-center shadow-2xl transform scale-95 transition-transform duration-300">
            <div class="w-12 h-12 bg-[#0d9488]/10 text-[#2dd4bf] rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-[#0d9488]/20 animate-bounce">
                <i class="fa-solid fa-mobile-screen-button"></i>
            </div>
            <h3 class="text-base font-bold text-white mb-2">Akses Kamera Terbatas</h3>
            <p class="text-xs text-[#94a3b8] leading-relaxed mb-5">
                Fitur pemindaian langsung memerlukan hardware kamera. Harap masuk ke akun **SpendWise** Anda melalui browser ponsel cerdas (*smartphone*) untuk memindai kode secara instan.
            </p>
            <button id="btn-close-modal" type="button" class="w-full bg-[#334155] hover:bg-[#475569] text-white text-xs font-bold py-2.5 rounded-xl transition-all cursor-pointer">
                Mengerti & Tutup
            </button>
        </div>
    </div>

    <!-- ================= MODAL SCRIPT INTERACTION ================= -->
    <script>
        const btnScan = document.getElementById('btn-scan');
        const modal = document.getElementById('camera-modal');
        const btnClose = document.getElementById('btn-close-modal');

        // Fungsi membuka Pop-up dengan efek transisi halus
        btnScan.addEventListener('click', () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.firstElementChild.classList.remove('scale-95');
            }, 10);
        });

        // Fungsi menutup Pop-up
        btnClose.addEventListener('click', () => {
            modal.classList.add('opacity-0');
            modal.firstElementChild.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        });

        // Menutup modal jika area luar diklik
        modal.addEventListener('click', (e) => {
            if(e.target === modal) btnClose.click();
        });
    </script>

</body>
</html>