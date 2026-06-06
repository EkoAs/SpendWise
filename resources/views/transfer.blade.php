<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md h-screen md:h-auto md:min-h-[500px] flex flex-col">
        
        <div class="flex items-center mb-6 border-b pb-4">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-blue-600 mr-4">
                <i class="fa-solid fa-arrow-left text-xl"></i>
            </a>
            <h2 class="text-xl font-bold text-gray-800">Kirim Uang</h2>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 text-sm font-semibold">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('transfer.process') }}" method="POST" class="flex-1 flex flex-col">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nomor Tujuan / Rekening</label>
                <input type="text" name="destination" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50" placeholder="Contoh: 0812xxxx atau 1234xxxx" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nominal Transfer</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 font-bold">Rp</span>
                    <input type="number" name="amount" class="w-full pl-12 pr-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 text-lg font-bold" placeholder="20000" min="20000" required>
                </div>
                <p class="text-xs text-gray-500 mt-1">*Minimum transfer Rp 20.000</p>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi PIN Kamu</label>
                <input type="password" name="pin" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 tracking-[0.5em] text-center text-lg" placeholder="******" maxlength="6" required>
            </div>

            <button type="submit" class="mt-auto md:mt-4 w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-xl hover:bg-blue-700 transition shadow-md">
                Kirim Sekarang
            </button>
        </form>
    </div>
</body>
</html>