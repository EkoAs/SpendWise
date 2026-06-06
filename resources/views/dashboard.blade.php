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

    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row min-h-screen">

        <div class="w-full md:w-1/2 bg-blue-600 text-white p-6 flex flex-col justify-center h-[30vh] md:h-screen md:sticky md:top-0">
            <h1 class="text-lg font-semibold mb-1">Hai, {{ $user->name }}!</h1>
            <p class="text-blue-200 text-sm mb-4">Saldo Utama Kamu</p>
            
            <div class="flex items-center space-x-3 mb-2">
                <h2 class="text-4xl font-bold" id="balanceText" data-balance="Rp {{ number_format($user->balance, 0, ',', '.') }}">
                    Rp {{ number_format($user->balance, 0, ',', '.') }}
                </h2>
                <button onclick="toggleBalance()" class="text-blue-200 hover:text-white focus:outline-none">
                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                </button>
            </div>

            <div class="flex space-x-4 mt-4 text-sm bg-blue-700/50 p-2 rounded-lg inline-block w-max">
                <span><i class="fa-solid fa-dollar-sign"></i> USD: 0.00</span>
                <span><i class="fa-solid fa-euro-sign"></i> EUR: 0.00</span>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex flex-col">
            
            <div class="h-[50vh] md:h-auto bg-white p-6 grid grid-cols-3 gap-4 content-center shadow-sm">
                <a href="{{ route('transfer') }}" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-money-bill-transfer"></i></div>
                    <span class="text-xs font-semibold text-center">Transfer</span>
                </a>

                <a href="{{ route('va') }}" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-building-columns"></i></div>
                    <span class="text-xs font-semibold text-center">Bayar VA</span>
                </a>

                <a href="{{ route('topup') }}" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-wallet"></i></div>
                    <span class="text-xs font-semibold text-center">Top Up</span>
                </a>

                <a href="{{ route('bill') }}" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                    <span class="text-xs font-semibold text-center">Tagihan</span>
                </a>
                <a href="{{ route('netmarket') }}" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-wifi"></i></div>
                    <span class="text-xs font-semibold text-center">NetMarket</span>
                </a>
                <a href="{{ route('qris') }}" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-qrcode"></i></div>
                    <span class="text-xs font-semibold text-center">QRIS</span>
                </a>
            </div>
            <!-- <div class="p-6 flex-1 bg-gray-50">
                <h3 class="font-bold text-gray-700 mb-4">Log Transaksi Terbaru</h3>
                
                @forelse($transactions as $trx)
                    @php
                        $isIncome = $trx->type === 'topup';
                        $color = $isIncome ? 'green' : 'red';
                        $sign = $isIncome ? '+' : '-';
                    @endphp -->
<!-- 
                    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-{{ $color }}-500 mb-3 flex justify-between items-center">
                        <div>
                            <p class="font-bold text-sm capitalize">{{ $trx->description }}</p>
                            <p class="text-xs text-gray-500">{{ $trx->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <span class="text-{{ $color }}-600 font-bold text-sm">
                            {{ $sign }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                        </span>
                    </div>
                @empty
                    <div class="text-center text-gray-500 text-sm mt-6">
                        Belum ada transaksi bulan ini.
                    </div>
                @endforelse

            </div> -->

            <div class="p-6 flex-1 bg-gray-50 space-y-6">
                
                <div>
                    <h3 class="font-bold text-gray-700 mb-3"><i class="fa-solid fa-bell text-amber-500 mr-1"></i> Pengingat Tagihan</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-red-500 flex justify-between items-center">
                            <div>
                                <p class="font-bold text-sm text-gray-800">Air PDAM</p>
                                <p class="text-xs text-gray-500">Tempo: 10 Juni 2026 (Sisa 4 Hari)</p>
                            </div>
                            <span class="text-red-600 font-bold text-sm">Rp 130.000</span>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-orange-500 flex justify-between items-center">
                            <div>
                                <p class="font-bold text-sm text-gray-800">Listrik PLN</p>
                                <p class="text-xs text-gray-500">Tempo: 15 Juni 2026 (Sisa 9 Hari)</p>
                            </div>
                            <span class="text-orange-600 font-bold text-sm">Rp 150.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border">
                    <h3 class="font-bold text-gray-700 mb-3"><i class="fa-solid fa-folder-plus text-blue-500 mr-1"></i> Tambah Kategori Anggaran</h3>
                    <form action="{{ route('budget.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                        @csrf
                        <input type="text" name="category" placeholder="Contoh: Makan, Kost, Kuliah" class="flex-1 px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <input type="number" name="limit_amount" placeholder="Batas Maksimal (Rp)" class="flex-1 px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition">Simpan</button>
                    </form>
                </div>

                <div>
                    <h3 class="font-bold text-gray-700 mb-3"><i class="fa-solid fa-chart-bar text-purple-500 mr-1"></i> Grafik Batang Pengeluaran Bulanan</h3>
                    <div class="bg-white p-4 rounded-xl shadow-sm border space-y-4">
                        @forelse($budgets as $budget)
                            @php
                                // Hitung persentase pemakaian anggaran
                                $percentage = $budget->limit_amount > 0 ? ($budget->spent_amount / $budget->limit_amount) * 100 : 0;
                                if ($percentage > 100) $percentage = 100;
                                
                                // Poin 3E: Jika di atas 80%, beri alert warna merah, jika aman beri warna biru
                                $barColor = $percentage >= 80 ? 'bg-red-500' : 'bg-blue-500';
                            @endphp
                            <div>
                                <div class="flex justify-between text-xs font-semibold mb-1">
                                    <span class="text-gray-700">{{ $budget->category }}</span>
                                    <span class="text-gray-500">Rp {{ number_format($budget->spent_amount,0,',','.') }} / Rp {{ number_format($budget->limit_amount,0,',','.') }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                    <div class="{{ $barColor }} h-3 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                                </div>
                                @if($percentage >= 80)
                                    <p class="text-[10px] text-red-500 font-bold mt-1"><i class="fa-solid fa-triangle-exclamation"></i> Alert: Pengeluaran hampir atau sudah melebihi batas maksimal!</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 text-center py-2">Belum ada kategori anggaran. Silakan buat di atas!</p>
                        @endforelse
                    </div>
                </div>

                <div>
                    <h3 class="font-bold text-gray-700 mb-3"><i class="fa-solid fa-history text-teal-500 mr-1"></i> Log Transaksi Terbaru</h3>
                    @forelse($transactions as $trx)
                        @php
                            $isIncome = $trx->type === 'topup';
                            $color = $isIncome ? 'green' : 'red';
                            $sign = $isIncome ? '+' : '-';
                        @endphp
                        <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-{{ $color }}-500 mb-3 flex justify-between items-center">
                            <div>
                                <p class="font-bold text-sm text-gray-800 capitalize">{{ $trx->description }}</p>
                                <p class="text-xs text-gray-500">{{ $trx->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <span class="text-{{ $color }}-600 font-bold text-sm">
                                {{ $sign }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 text-sm py-4 bg-white rounded-xl border">Belum ada transaksi.</div>
                    @endforelse
                </div>

            </div>

            <footer class="bg-gray-800 text-gray-400 text-xs text-center p-4">
                <p>&copy; 2026 SpendWise E-Wallet. All rights reserved.</p>
            </footer>

        </div>
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
</body>
</html>