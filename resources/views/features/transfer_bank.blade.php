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
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-100">
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-blue-500 mb-5 inline-block font-medium"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    
    <h2 class="text-2xl font-extrabold text-slate-800 mb-6 flex items-center gap-2">
        <i class="fa-solid fa-building-columns text-indigo-500"></i> Transfer Bank
    </h2>
    
    <form action="{{ route('wallet.transfer.bank') }}" method="POST" class="space-y-5">
        @csrf
        
        <!-- Pilihan Bank (Menggunakan Radio Button Tersembunyi untuk UI Murni) -->
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Bank Tujuan</label>
            <div class="grid grid-cols-2 gap-3">
                <label class="cursor-pointer">
                    <input type="radio" name="bank_name" value="BCA" class="peer sr-only" required>
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50 text-center font-extrabold text-blue-800 transition-all">BCA</div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="bank_name" value="Mandiri" class="peer sr-only">
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-yellow-500 peer-checked:bg-yellow-50 text-center font-extrabold text-yellow-600 transition-all">MANDIRI</div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="bank_name" value="BNI" class="peer sr-only">
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-orange-500 peer-checked:bg-orange-50 text-center font-extrabold text-orange-600 transition-all">BNI</div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="bank_name" value="BRI" class="peer sr-only">
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-blue-400 peer-checked:bg-blue-50 text-center font-extrabold text-blue-600 transition-all">BRI</div>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Rekening</label>
            <input type="number" name="account_number" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 font-semibold" placeholder="Masukkan no rekening" required>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Transfer</label>
            <div class="flex items-center w-full bg-slate-50 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-indigo-500 overflow-hidden">
                <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-3 outline-none font-bold text-slate-700" placeholder="Min. 10.000" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
            <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 font-bold text-center tracking-[0.5em]" placeholder="******" required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3.5 rounded-xl hover:bg-indigo-700 transition-colors">Kirim Sekarang</button>
    </form>
</div>



</body></html>