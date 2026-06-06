<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar VA - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
        <div class="flex items-center mb-6 border-b pb-4">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-blue-600 mr-4"><i class="fa-solid fa-arrow-left text-xl"></i></a>
            <h2 class="text-xl font-bold text-gray-800">Bayar Virtual Account</h2>
        </div>

        @if($errors->any()) <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 text-sm font-semibold">{{ $errors->first() }}</div> @endif

        <form action="{{ route('va.process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Kode VA dari App Lain (Dummy)</label>
                <input type="text" name="va_code" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50" placeholder="1234567890" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Total Pembayaran</label>
                <input type="text" value="Rp 30.000" class="w-full px-4 py-3 border rounded-xl bg-gray-200 text-gray-600 font-bold" disabled>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi PIN Kamu</label>
                <input type="password" name="pin" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 tracking-[0.5em] text-center text-lg" placeholder="******" maxlength="6" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-xl hover:bg-green-700 shadow-md">Bayar Sekarang</button>
        </form>
    </div>
</body>
</html>