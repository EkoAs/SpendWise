<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagihan - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        /* Efek fokus input premium ala e-commerce modern */
        .custom-input:focus, .custom-select:focus {
            background-color: rgba(15, 23, 42, 0.8) !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.25) !important;
        }
        /* Menyembunyikan panah default select bawaan browser */
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden overflow-y-auto p-4 sm:p-6">

    <!-- ================= BACKGROUND ORBS (Tema Utama SpendWise) ================= -->
    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <!-- Orb Blue -->
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#2563eb] opacity-25"></div>
        <!-- Orb Indigo -->
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#4f46e5] opacity-25"></div>
        <!-- Orb Crimson (Aksen khusus halaman tagihan) -->
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#f43f5e] opacity-15"></div>
    </div>

    <!-- ================= MAIN CARD (DARK GLASSMORPHISM) ================= -->
    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] z-10 relative">
        
        <!-- Header: Tombol Back + Logo Andalan Kiri Atas -->
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-[#334155]/40">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-[#94a3b8] hover:text-[#3b82f6] transition-colors duration-200">
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
            <!-- Badge Kategori Fitur Digital / Biller -->
            <span class="text-[10px] font-extrabold text-[#f43f5e] bg-[#f43f5e]/10 border border-[#f43f5e]/30 px-3 py-1 rounded-full uppercase tracking-wider">
                Digital Bill
            </span>
        </div>

        <!-- Pesan Error Dinamis -->
        @if($errors->any()) 
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-xl mb-5 text-sm font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-exclamation text-red-500 shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div> 
        @endif

        <!-- Form Pemrosesan Tagihan -->
        <form action="{{ route('bill.process') }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Input 1: Jenis Tagihan (Dropdown Style E-Commerce) -->
            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Jenis Tagihan</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b] z-10">
                        <i class="fa-solid fa-receipt text-sm"></i>
                    </span>
                    <select name="biller" id="billerSelect" class="custom-select w-full pl-11 pr-10 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white rounded-xl focus:outline-none transition-all text-sm font-medium cursor-pointer relative z-0" onchange="updatePrice()" required>
                        <option value="Listrik" data-price="150000" class="bg-[#0f172a] text-white">Listrik PLN</option>
                        <option value="Air" data-price="130000" class="bg-[#0f172a] text-white">Air PDAM</option>
                        <option value="Internet" data-price="250000" class="bg-[#0f172a] text-white">Internet / WiFi</option>
                        <option value="Asuransi" data-price="100000" class="bg-[#0f172a] text-white">Asuransi Kesehatan</option>
                        <option value="Pajak" data-price="300000" class="bg-[#0f172a] text-white">Pajak Kendaraan</option>
                    </select>
                    <!-- Custom Arrow Icon untuk menggantikan default browser -->
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#64748b] pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </span>
                </div>
            </div>
            
            <!-- Input 2: ID Pelanggan -->
            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">ID Pelanggan (Dummy)</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#64748b]">
                        <i class="fa-solid fa-user-tag text-sm"></i>
                    </span>
                    <input type="text" name="customer_id" class="custom-input w-full pl-11 pr-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white placeholder-[#64748b] rounded-xl focus:outline-none transition-all text-sm font-medium" placeholder="Contoh: 81726354" required>
                </div>
            </div>

            <!-- Input 3: Jumlah Tagihan (Disabled Modern Summary Box) -->
            <div class="space-y-2">
                <label class="block text-[#cbd5e1] text-sm font-semibold">Jumlah Tagihan</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-rose-400/80">
                        <i class="fa-solid fa-money-bill-wave text-sm"></i>
                    </span>
                    <input type="text" id="priceDisplay" value="Rp 150.000" class="w-full pl-11 pr-4 py-3.5 bg-slate-800/40 border border-slate-700/40 text-rose-400 font-extrabold rounded-xl cursor-not-allowed text-base shadow-inner" disabled>
                </div>
            </div>

            <!-- Input 4: Konfirmasi PIN Keamanan -->
            <div class="space-y-2 pt-1">
                <label class="block text-[#cbd5e1] text-sm font-semibold text-center">Konfirmasi PIN Kamu</label>
                <input type="password" name="pin" class="custom-input w-full px-4 py-3.5 bg-[#020617]/50 border border-[#334155]/70 text-white tracking-[0.6em] text-center text-xl font-bold rounded-xl focus:outline-none transition-all placeholder-[#64748b]/50" placeholder="••••••" maxlength="6" inputmode="numeric" required>
            </div>

            <!-- Tombol Submit (Rose to Red Premium Gradient) -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-rose-500 to-red-600 hover:from-rose-600 hover:to-red-700 text-white font-bold py-4 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(244,63,94,0.2)] hover:shadow-[0_6px_20px_rgba(244,63,94,0.4)] hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 cursor-pointer text-sm">
                    <i class="fa-solid fa-shield-check text-xs"></i> Bayar Tagihan Sekarang
                </button>
            </div>
        </form>

        <!-- Proteksi & Keamanan Transaksi E-Commerce -->
        <div class="mt-6 pt-4 border-t border-[#334155]/20 flex items-center justify-center gap-2 text-[11px] text-[#64748b] font-medium uppercase tracking-wider">
            <i class="fa-solid fa-lock text-rose-500"></i> Instant & Secure Checkout
        </div>

    </div>

    <!-- ================= SCRIPT LOGIC (DIPERTAHANKAN 100%) ================= -->
    <script>
        function updatePrice() {
            let select = document.getElementById('billerSelect');
            let price = select.options[select.selectedIndex].getAttribute('data-price');
            document.getElementById('priceDisplay').value = 'Rp ' + parseInt(price).toLocaleString('id-ID');
        }
    </script>
</body>
</html>