<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurs Mata Uang - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        /* Animasi Melayang untuk Ikon Mata Uang */
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

    <!-- ================= BACKGROUND ORBS & FLOATING ICONS ================= -->
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[12vw] font-black text-[#0f172a]/40 -rotate-12 select-none tracking-tighter">CURRENCY</h1>
    </div>

    <!-- Floating Currency Icons (FontAwesome for cleaner dark mode look) -->
    <div class="fixed top-[15%] left-[10%] text-6xl text-[#334155]/40 blur-[1px] animate-float pointer-events-none z-0 select-none"><i class="fa-solid fa-dollar-sign"></i></div>
    <div class="fixed bottom-[20%] right-[10%] text-7xl text-[#334155]/30 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none"><i class="fa-solid fa-euro-sign"></i></div>
    <div class="fixed top-[60%] left-[5%] text-7xl text-[#334155]/40 blur-[1px] animate-float pointer-events-none z-0 select-none"><i class="fa-solid fa-yen-sign"></i></div>
    <div class="fixed top-[10%] right-[15%] text-6xl text-[#334155]/30 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none"><i class="fa-solid fa-sterling-sign"></i></div>

    <!-- Glowing Orbs (Sky & Blue) -->
    <div class="fixed top-[-10%] right-[-10%] w-96 h-96 bg-[#0ea5e9] rounded-full mix-blend-screen filter blur-[120px] opacity-20 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-96 h-96 bg-[#3b82f6] rounded-full mix-blend-screen filter blur-[120px] opacity-15 z-0 pointer-events-none"></div>

    <!-- ================= MAIN CONTAINER ================= -->
    <div class="w-full max-w-lg z-10 relative space-y-6">

        <!-- Header: Back Button & Logo -->
        <div class="flex items-center justify-between bg-[#0f172a]/70 backdrop-blur-md border border-[#334155]/50 px-6 py-4 rounded-[1.5rem] shadow-lg">
            <div class="flex items-center gap-4">
                <a href="{{ url('/dashboard') }}" class="text-[#94a3b8] hover:text-[#0ea5e9] transition-colors duration-200">
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
            <!-- Badge Live -->
            <div class="flex items-center gap-1.5 bg-[#0ea5e9]/10 border border-[#0ea5e9]/30 px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#38bdf8] animate-pulse"></span>
                <span class="text-[10px] font-extrabold text-[#38bdf8] uppercase tracking-wider">LIVE KURS</span>
            </div>
        </div>

        <!-- Card Container -->
        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50">
            
            <!-- Header Judul -->
            <div class="flex items-center gap-4 mb-8 bg-[#0ea5e9]/10 p-4 rounded-2xl border border-[#0ea5e9]/20 relative overflow-hidden">
                <i class="fa-solid fa-earth-americas absolute -right-4 -bottom-4 text-6xl text-[#0ea5e9]/10 -rotate-12"></i>
                
                <div class="w-14 h-14 bg-gradient-to-br from-[#0ea5e9] to-[#0284c7] text-white rounded-xl flex items-center justify-center text-2xl shadow-[0_4px_15px_rgba(14,165,233,0.3)] relative z-10">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div class="relative z-10">
                    <h2 class="text-xl font-extrabold text-white">Kurs Mata Uang</h2>
                    <p class="text-sm text-[#94a3b8] font-medium mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-satellite-dish text-[#38bdf8] text-xs animate-pulse"></i> Data Real-time Global
                    </p>
                </div>
            </div>
            
            <!-- List Data Mata Uang -->
            <div class="space-y-4">
                
                <!-- USD -->
                <div class="flex justify-between items-center p-5 bg-[#020617]/50 border border-[#334155]/70 hover:border-[#0ea5e9]/50 hover:bg-[#0ea5e9]/5 hover:shadow-[0_4px_20px_rgba(14,165,233,0.1)] rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl filter drop-shadow-md group-hover:scale-110 transition-transform">🇺🇸</span> 
                        <div>
                            <span class="block font-bold text-white text-lg leading-tight">USD</span>
                            <span class="text-xs font-medium text-[#94a3b8]">Dolar Amerika</span>
                        </div>
                    </div>
                    <span class="font-extrabold text-[#38bdf8] text-lg tracking-wide" id="usd-rate">Memuat...</span>
                </div>

                <!-- EUR -->
                <div class="flex justify-between items-center p-5 bg-[#020617]/50 border border-[#334155]/70 hover:border-[#0ea5e9]/50 hover:bg-[#0ea5e9]/5 hover:shadow-[0_4px_20px_rgba(14,165,233,0.1)] rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl filter drop-shadow-md group-hover:scale-110 transition-transform">🇪🇺</span> 
                        <div>
                            <span class="block font-bold text-white text-lg leading-tight">EUR</span>
                            <span class="text-xs font-medium text-[#94a3b8]">Euro</span>
                        </div>
                    </div>
                    <span class="font-extrabold text-[#38bdf8] text-lg tracking-wide" id="eur-rate">Memuat...</span>
                </div>

                <!-- CNY -->
                <div class="flex justify-between items-center p-5 bg-[#020617]/50 border border-[#334155]/70 hover:border-[#0ea5e9]/50 hover:bg-[#0ea5e9]/5 hover:shadow-[0_4px_20px_rgba(14,165,233,0.1)] rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl filter drop-shadow-md group-hover:scale-110 transition-transform">🇨🇳</span> 
                        <div>
                            <span class="block font-bold text-white text-lg leading-tight">CNY</span>
                            <span class="text-xs font-medium text-[#94a3b8]">Yuan Tiongkok</span>
                        </div>
                    </div>
                    <span class="font-extrabold text-[#38bdf8] text-lg tracking-wide" id="cny-rate">Memuat...</span>
                </div>

                <!-- SGD -->
                <div class="flex justify-between items-center p-5 bg-[#020617]/50 border border-[#334155]/70 hover:border-[#0ea5e9]/50 hover:bg-[#0ea5e9]/5 hover:shadow-[0_4px_20px_rgba(14,165,233,0.1)] rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl filter drop-shadow-md group-hover:scale-110 transition-transform">🇸🇬</span> 
                        <div>
                            <span class="block font-bold text-white text-lg leading-tight">SGD</span>
                            <span class="text-xs font-medium text-[#94a3b8]">Dolar Singapura</span>
                        </div>
                    </div>
                    <span class="font-extrabold text-[#38bdf8] text-lg tracking-wide" id="sgd-rate">Memuat...</span>
                </div>

                <!-- AUD -->
                <div class="flex justify-between items-center p-5 bg-[#020617]/50 border border-[#334155]/70 hover:border-[#0ea5e9]/50 hover:bg-[#0ea5e9]/5 hover:shadow-[0_4px_20px_rgba(14,165,233,0.1)] rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl filter drop-shadow-md group-hover:scale-110 transition-transform">🇦🇺</span> 
                        <div>
                            <span class="block font-bold text-white text-lg leading-tight">AUD</span>
                            <span class="text-xs font-medium text-[#94a3b8]">Dolar Australia</span>
                        </div>
                    </div>
                    <span class="font-extrabold text-[#38bdf8] text-lg tracking-wide" id="aud-rate">Memuat...</span>
                </div>

                <!-- MYR -->
                <div class="flex justify-between items-center p-5 bg-[#020617]/50 border border-[#334155]/70 hover:border-[#0ea5e9]/50 hover:bg-[#0ea5e9]/5 hover:shadow-[0_4px_20px_rgba(14,165,233,0.1)] rounded-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl filter drop-shadow-md group-hover:scale-110 transition-transform">🇲🇾</span> 
                        <div>
                            <span class="block font-bold text-white text-lg leading-tight">MYR</span>
                            <span class="text-xs font-medium text-[#94a3b8]">Ringgit Malaysia</span>
                        </div>
                    </div>
                    <span class="font-extrabold text-[#38bdf8] text-lg tracking-wide" id="myr-rate">Memuat...</span>
                </div>

            </div>

            <!-- Info Footer Card -->
            <div class="mt-8 text-center bg-[#020617]/40 py-3 rounded-xl border border-[#334155]/50 border-dashed">
                <p class="text-[11px] text-[#64748b] font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-chart-line text-[#0ea5e9] mr-1"></i> Berdasarkan rasio tukar global harian
                </p>
            </div>

        </div>

    </div>

    <!-- Script untuk Load Data Kurs via AJAX (seperti di Dashboard) -->
    <script>
        async function fetchCurrencyRates() {
            try {
                const response = await fetch("{{ route('api.currency.rates') }}");
                const data = await response.json();
                
                // Update setiap mata uang
                document.getElementById('usd-rate').innerText = 'Rp ' + data.USD;
                document.getElementById('eur-rate').innerText = 'Rp ' + data.EUR;
                document.getElementById('cny-rate').innerText = 'Rp ' + data.CNY;
                document.getElementById('sgd-rate').innerText = 'Rp ' + data.SGD;
                document.getElementById('aud-rate').innerText = 'Rp ' + data.AUD;
                document.getElementById('myr-rate').innerText = 'Rp ' + data.MYR;
            } catch (error) {
                console.error('Gagal mengambil data kurs:', error);
                
                // Tampilkan error ke user dengan style yang sama
                const errorText = 'Error';
                document.getElementById('usd-rate').innerText = errorText;
                document.getElementById('eur-rate').innerText = errorText;
                document.getElementById('cny-rate').innerText = errorText;
                document.getElementById('sgd-rate').innerText = errorText;
                document.getElementById('aud-rate').innerText = errorText;
                document.getElementById('myr-rate').innerText = errorText;
            }
        }

        // Jalankan saat halaman selesai dimuat (seperti di dashboard)
        fetchCurrencyRates();
    </script>

</body>
</html>