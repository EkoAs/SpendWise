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
    <a href="{{ url('/dashboard') }}" class="text-slate-400 hover:text-purple-500 mb-5 inline-block font-medium"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    
    <h2 class="text-2xl font-extrabold text-slate-800 mb-6 flex items-center gap-2">
        <i class="fa-solid fa-wallet text-purple-500"></i> Transfer E-Wallet
    </h2>
    
    <form action="{{ route('wallet.transfer.ewallet') }}" method="POST" class="space-y-5">
        @csrf
        
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Provider</label>
            <div class="grid grid-cols-3 gap-3">
                <label class="cursor-pointer">
                    <input type="radio" name="provider" value="Gopay" class="peer sr-only" required>
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 text-center font-bold text-green-600 transition-all">Gopay</div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="provider" value="DANA" class="peer sr-only">
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 text-center font-bold text-blue-500 transition-all">DANA</div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="provider" value="ShopeePay" class="peer sr-only">
                    <div class="p-3 border-2 border-slate-100 rounded-xl peer-checked:border-orange-500 peer-checked:bg-orange-50 text-center font-bold text-orange-500 transition-all">Shopee</div>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nomor HP / Akun</label>
            <input type="number" name="phone_number" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-purple-500 font-semibold" placeholder="Contoh: 0812345678" required>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nominal</label>
            <div class="flex items-center w-full bg-slate-50 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-purple-500 overflow-hidden">
                <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-3 outline-none font-bold text-slate-700" placeholder="Min. 10.000" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
            <input type="password" name="pin" maxlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-purple-500 font-bold text-center tracking-[0.5em]" required>
        </div>

        <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3.5 rounded-xl hover:bg-purple-700 transition-colors">Top Up Sekarang</button>
    </form>
</div>


</body></html>