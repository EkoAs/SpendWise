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
                <a href="#" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-wifi"></i></div>
                    <span class="text-xs font-semibold text-center">NetMarket</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-3 rounded-xl hover:bg-blue-50 transition">
                    <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mb-2 text-xl"><i class="fa-solid fa-qrcode"></i></div>
                    <span class="text-xs font-semibold text-center">QRIS</span>
                </a>
            </div>

            <div class="p-6 flex-1 bg-gray-50">
                <h3 class="font-bold text-gray-700 mb-4">Pengingat Tagihan & Log Terbaru</h3>
                <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-red-500 mb-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-sm">Tagihan Listrik</p>
                        <p class="text-xs text-gray-500">Jatuh tempo: 3 Hari Lagi</p>
                    </div>
                    <span class="text-red-600 font-bold text-sm">- Rp 130.000</span>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-green-500 mb-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-sm">Top Up Berhasil</p>
                        <p class="text-xs text-gray-500">12 Okt 2026</p>
                    </div>
                    <span class="text-green-600 font-bold text-sm">+ Rp 50.000</span>
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