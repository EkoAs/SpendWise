<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm text-center">
        <h2 class="text-2xl font-bold text-blue-600 mb-2">Verifikasi Kode</h2>
        <p class="text-sm text-gray-500 mb-6">Masukkan kode OTP (Dummy: 000000)</p>
        
        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-2 rounded mb-4 text-sm">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('verify.process') }}" method="POST">
            @csrf
            <div class="mb-6">
                <input type="text" name="code" class="w-full text-center tracking-widest px-3 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-xl font-bold" maxlength="6" placeholder="------" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">Verifikasi</button>
        </form>
    </div>
</body>
</html>