<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">
<!-- Wrapper Utama dengan background abu-abu kebiruan yang sangat soft -->
    <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row min-h-screen bg-slate-50 font-sans selection:bg-blue-500 selection:text-white">

        <!-- KIRI: PANEL SALDO (Gradient & Glassmorphism Blur) -->
        <div class="w-full md:w-[35%] lg:w-[30%] bg-gradient-to-br from-slate-900 via-indigo-950 to-blue-950 text-white p-8 md:p-12 flex flex-col justify-center min-h-[40vh] md:h-screen md:sticky md:top-0 relative overflow-hidden shadow-[4px_0_24px_rgba(0,0,0,0.1)] z-10">
            
            <!-- Efek Blur Cahaya di Belakang (Modern UI) -->
            <div class="absolute top-[-10%] left-[-10%] w-64 h-64 bg-blue-600 rounded-full mix-blend-screen filter blur-[80px] opacity-60"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-64 h-64 bg-purple-600 rounded-full mix-blend-screen filter blur-[80px] opacity-60"></div>

            <div class="relative z-20">
                <div class="inline-block bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-4 py-1.5 mb-6 shadow-sm">
                    <h1 class="text-sm font-medium tracking-wide">👋 Hai, <span class="font-bold text-white">{{ $user->name }}</span>!</h1>
                </div>
                
                <p class="text-indigo-200 text-sm font-medium tracking-wider uppercase mb-2">Total Saldo Aktif</p>
                
                <div class="flex items-center space-x-4 mb-8">
                    <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight drop-shadow-lg" id="balanceText" data-balance="Rp {{ number_format($user->balance, 0, ',', '.') }}">
                        Rp {{ number_format($user->balance, 0, ',', '.') }}
                    </h2>
                    <button onclick="toggleBalance()" class="w-10 h-10 flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/10 rounded-full transition-all focus:outline-none shadow-md hover:scale-110">
                        <i class="fa-solid fa-eye text-indigo-100" id="eyeIcon"></i>
                    </button>
                </div>

                <!-- MATA UANG: Dibuat seperti kartu kaca melayang (Glass Card) -->
                <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-4 rounded-2xl flex justify-between items-center text-xs font-bold text-white shadow-[0_8px_32px_rgba(0,0,0,0.2)]">
                    <span class="flex flex-col items-center gap-1.5 w-1/3 border-r border-white/10">
                        <img src="https://flagcdn.com/w20/us.png" alt="USD" class="w-5 h-3.5 rounded-sm shadow-sm ring-1 ring-white/30">
                        <span id="usd-val" class="tracking-wide text-indigo-100">Memuat...</span>
                    </span>
                    <span class="flex flex-col items-center gap-1.5 w-1/3 border-r border-white/10">
                        <img src="https://flagcdn.com/w20/eu.png" alt="EUR" class="w-5 h-3.5 rounded-sm shadow-sm ring-1 ring-white/30">
                        <span id="eur-val" class="tracking-wide text-indigo-100">Memuat...</span>
                    </span>
                    <span class="flex flex-col items-center gap-1.5 w-1/3">
                        <img src="https://flagcdn.com/w20/sg.png" alt="SGD" class="w-5 h-3.5 rounded-sm shadow-sm ring-1 ring-white/30">
                        <span id="sgd-val" class="tracking-wide text-indigo-100">Memuat...</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- KANAN: KONTEN UTAMA -->
        <div class="w-full md:w-[65%] lg:w-[70%] flex flex-col bg-[#f8fafc]">
            
            <!-- Area Padding Utama -->
            <div class="p-6 md:p-10 space-y-10 flex-1">
                
                <!-- MENU NAVIGASI: Bentuk floating card -->
                <div class="grid grid-cols-3 lg:grid-cols-6 gap-4">
                    <a href="{{ route('transfer') }}" class="group flex flex-col items-center justify-center p-4 bg-white rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(59,130,246,0.15)] hover:-translate-y-1.5 transition-all duration-300 border border-slate-100">
                        <div class="w-14 h-14 bg-gradient-to-tr from-blue-100 to-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-3 text-2xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-money-bill-transfer"></i></div>
                        <span class="text-xs font-bold text-slate-700">Transfer</span>
                    </a>
                    <a href="{{ route('va') }}" class="group flex flex-col items-center justify-center p-4 bg-white rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(16,185,129,0.15)] hover:-translate-y-1.5 transition-all duration-300 border border-slate-100">
                        <div class="w-14 h-14 bg-gradient-to-tr from-emerald-100 to-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-3 text-2xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-building-columns"></i></div>
                        <span class="text-xs font-bold text-slate-700">Bayar VA</span>
                    </a>
                    <a href="{{ route('topup') }}" class="group flex flex-col items-center justify-center p-4 bg-white rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(249,115,22,0.15)] hover:-translate-y-1.5 transition-all duration-300 border border-slate-100">
                        <div class="w-14 h-14 bg-gradient-to-tr from-orange-100 to-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-3 text-2xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-wallet"></i></div>
                        <span class="text-xs font-bold text-slate-700">Top Up</span>
                    </a>
                    <a href="{{ route('bill') }}" class="group flex flex-col items-center justify-center p-4 bg-white rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(225,29,72,0.15)] hover:-translate-y-1.5 transition-all duration-300 border border-slate-100">
                        <div class="w-14 h-14 bg-gradient-to-tr from-rose-100 to-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mb-3 text-2xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                        <span class="text-xs font-bold text-slate-700">Tagihan</span>
                    </a>
                    <a href="{{ route('netmarket') }}" class="group flex flex-col items-center justify-center p-4 bg-white rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(168,85,247,0.15)] hover:-translate-y-1.5 transition-all duration-300 border border-slate-100">
                        <div class="w-14 h-14 bg-gradient-to-tr from-purple-100 to-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-3 text-2xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-wifi"></i></div>
                        <span class="text-xs font-bold text-slate-700">NetMarket</span>
                    </a>
                    <a href="{{ route('qris') }}" class="group flex flex-col items-center justify-center p-4 bg-white rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(20,184,166,0.15)] hover:-translate-y-1.5 transition-all duration-300 border border-slate-100">
                        <div class="w-14 h-14 bg-gradient-to-tr from-teal-100 to-teal-50 text-teal-600 rounded-2xl flex items-center justify-center mb-3 text-2xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-qrcode"></i></div>
                        <span class="text-xs font-bold text-slate-700">QRIS</span>
                    </a>
                </div>

                <!-- RIWAYAT TRANSAKSI -->
                <div>
                    <h3 class="text-xl font-extrabold text-slate-800 mb-5 flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left text-blue-500"></i> Log Transaksi Terbaru
                    </h3>
                    <div class="space-y-3">
                        @forelse($transactions as $trx)
                            @php
                                $isIncome = $trx->type === 'topup';
                                $color = $isIncome ? 'green' : 'red';
                                $sign = $isIncome ? '+' : '-';
                            @endphp

                            <div class="bg-white p-5 rounded-2xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)] border border-slate-100 border-l-4 border-l-{{ $color }}-500 flex justify-between items-center hover:shadow-md transition-shadow">
                                <div>
                                    <p class="font-bold text-sm text-slate-700 capitalize">{{ $trx->description }}</p>
                                    <p class="text-xs text-slate-400 mt-0.5 font-medium">{{ $trx->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                <span class="text-{{ $color }}-600 font-extrabold text-sm bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-100">
                                    {{ $sign }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                                </span>
                            </div>
                        @empty
                            <div class="bg-white p-8 rounded-3xl border border-dashed border-slate-300 text-center text-slate-500 text-sm font-medium">
                                <i class="fa-solid fa-box-open text-3xl text-slate-300 mb-3 block"></i>
                                Belum ada transaksi bulan ini.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- FORM INPUT (Anggaran & Manual) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Form 1 -->
                    <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 text-blue-50 opacity-50"><i class="fa-solid fa-folder-plus text-8xl"></i></div>
                        <h3 class="font-bold text-slate-700 mb-4 text-lg relative z-10"><i class="fa-solid fa-folder-plus text-blue-500 mr-2"></i> Buat Anggaran Baru</h3>
                        <form action="{{ route('budget.store') }}" method="POST" class="flex flex-col gap-3 relative z-10">
                            @csrf
                            <input type="text" name="category" placeholder="Cth: Makan, Kost, Transport..." class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all" required>
                            <input type="number" name="limit_amount" placeholder="Limit Maksimal (Rp)" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all" required>
                            <button type="submit" class="mt-1 w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-3 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all">Simpan Anggaran</button>
                        </form>
                    </div>

                    <!-- Form 2 -->
                    <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 text-red-50 opacity-50"><i class="fa-solid fa-pen text-8xl"></i></div>
                        <h3 class="font-bold text-slate-700 mb-4 text-lg relative z-10"><i class="fa-solid fa-pen text-rose-500 mr-2"></i> Catat Pengeluaran</h3>
                        <form action="{{ route('expense.store') }}" method="POST" class="flex flex-col gap-3 relative z-10">
                            @csrf
                            <select name="budget_id" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-rose-500 focus:bg-white outline-none transition-all cursor-pointer" required>
                                <option value="" disabled selected>Pilih Kategori Anggaran</option>
                                @foreach($budgets as $budget)
                                    <option value="{{ $budget->id }}" class="text-slate-700">{{ $budget->category }} (Sisa: Rp {{ number_format($budget->limit_amount - $budget->spent_amount, 0, ',', '.') }})</option>
                                @endforeach
                            </select>
                            <div class="flex gap-3">
                                <input type="number" name="amount" placeholder="Nominal (Rp)" class="w-1/2 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-rose-500 focus:bg-white outline-none transition-all" required>
                                <input type="text" name="description" placeholder="Keterangan" class="w-1/2 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-rose-500 focus:bg-white outline-none transition-all" required>
                            </div>
                            <button type="submit" class="mt-1 w-full bg-gradient-to-r from-rose-500 to-red-600 text-white px-4 py-3 rounded-xl text-sm font-bold shadow-lg shadow-rose-500/30 hover:shadow-rose-500/50 hover:-translate-y-0.5 transition-all">Catat ke Grafik</button>
                        </form>
                    </div>
                </div>

                <!-- CHART / GRAFIK -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
                        <h3 class="font-extrabold text-slate-700 mb-5 text-center text-lg">📊 Pengeluaran vs Limit</h3>
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
                        <h3 class="font-extrabold text-slate-700 mb-5 text-center text-lg">🍩 Distribusi Anggaran</h3>
                        <div class="w-3/4 mx-auto">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>

            </div> <!-- End Padding Container -->

            <!-- FOOTER -->
            <footer class="text-slate-400 text-xs text-center py-6 font-medium border-t border-slate-200/60 bg-transparent">
                <p>&copy; 2026 SpendWise E-Wallet. Coded with ❤️. All rights reserved.</p>
            </footer>

        </div> <!-- End Konten Utama -->
    </div>

    <script>
        let isHidden = false;
        function toggleBalance() {
            const balanceEl = document.getElementById('balanceText');
            const iconEl = document.getElementById('eyeIcon');
            const realBalance = balanceEl.getAttribute('data-balance');
            
            if (isHidden) {
                balanceEl.innerText = realBalance;
                iconEl.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                balanceEl.innerText = 'Rp *******';
                iconEl.classList.replace('fa-eye', 'fa-eye-slash');
            }
            isHidden = !isHidden;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($chartLabels) !!};
        const spentData = {!! json_encode($chartSpent) !!};
        const limitData = {!! json_encode($chartLimit) !!};

        // Konfigurasi Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    { label: 'Terpakai (Rp)', data: spentData, backgroundColor: 'rgba(239, 68, 68, 0.7)' },
                    { label: 'Limit (Rp)', data: limitData, backgroundColor: 'rgba(59, 130, 246, 0.3)' }
                ]
            },
            options: { responsive: true }
        });

        // Konfigurasi Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: spentData,
                    backgroundColor: ['#ef4444', '#f59e0b', '#10b981', '#3b82f6', '#8b5cf6']
                }]
            },
            options: { responsive: true }
        });
    </script>
    <script>
        async function fetchCurrency() {
            try {
                // Menggunakan public API gratis untuk kurs IDR
                let response = await fetch('https://api.exchangerate-api.com/v4/latest/IDR');
                let data = await response.json();
                
                // Ambil saldo user dari Laravel
                let balance = {{ $user->balance }};
                
                // Hitung konversi dan tampilkan
                document.getElementById('usd-val').innerText = '$' + (balance * data.rates.USD).toFixed(2);
                document.getElementById('eur-val').innerText = '€' + (balance * data.rates.EUR).toFixed(2);
                document.getElementById('sgd-val').innerText = 'S$' + (balance * data.rates.SGD).toFixed(2);
            } catch (error) {
                console.log('Gagal mengambil data kurs');
                document.getElementById('usd-val').innerText = 'Error';
                document.getElementById('eur-val').innerText = 'Error';
                document.getElementById('sgd-val').innerText = 'Error';
            }
        }
        fetchCurrency();
    </script>
</body>
</html>