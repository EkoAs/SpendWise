<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-fuchsia-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>

    <div class="w-full max-w-lg bg-white/70 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white z-10">
        
        @if(session('success'))
            <div class="text-center py-4">
                <div class="w-20 h-20 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-inner">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Top Up Berhasil!</h2>
                
                <div class="bg-white/80 p-5 rounded-2xl mb-8 border border-slate-200 shadow-sm mt-6 border-dashed">
                    <p class="text-sm font-bold text-slate-700 text-center mb-4">{{ session('success') }}</p>
                    <hr class="border-slate-200 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-slate-400">Tanggal</span>
                        <span class="text-sm font-bold text-slate-700">{{ now()->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-slate-400">Status</span>
                        <span class="text-xs font-extrabold text-purple-600 bg-purple-100 px-2 py-1 rounded-md">SUKSES</span>
                    </div>
                </div>

                <a href="{{ url('/dashboard') }}" class="block w-full bg-slate-800 text-white font-bold py-4 rounded-xl hover:bg-slate-900 transition-all shadow-md">
                    Kembali ke Dashboard
                </a>
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-purple-600 mb-6 inline-block font-bold transition-colors">
                <i class="fa-solid fa-arrow-left mr-1"></i> Batal
            </a>
            
            <h2 class="text-3xl font-extrabold text-slate-800 mb-8 flex items-center gap-3">
                <div class="bg-purple-100 text-purple-500 p-3 rounded-xl"><i class="fa-solid fa-wallet"></i></div>
                Top Up E-Wallet
            </h2>

            @if(session('error'))
                <div class="p-4 mb-6 text-sm text-red-800 rounded-xl bg-red-50/80 backdrop-blur-sm font-bold border border-red-200 flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-6 text-sm text-red-800 rounded-xl bg-red-50/80 backdrop-blur-sm font-bold border border-red-200">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('wallet.transfer.ewallet') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Provider</label>
                    <div class="grid grid-cols-3 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="provider" value="Gopay" class="peer sr-only" required>
                            <div class="p-3 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 text-center font-bold text-green-600 shadow-sm transition-all hover:border-green-300">Gopay</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="provider" value="DANA" class="peer sr-only">
                            <div class="p-3 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 text-center font-bold text-blue-500 shadow-sm transition-all hover:border-blue-300">DANA</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="provider" value="ShopeePay" class="peer sr-only">
                            <div class="p-3 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-orange-500 peer-checked:bg-orange-50 text-center font-bold text-orange-500 shadow-sm transition-all hover:border-orange-300">Shopee</div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nomor HP / Akun</label>
                    <input type="number" name="phone_number" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 font-semibold text-slate-800 shadow-inner transition-all text-lg" placeholder="Contoh: 0812345678" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Top Up</label>
                    <div class="flex items-center w-full bg-white/80 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-purple-500 focus-within:border-purple-500 overflow-hidden shadow-inner transition-all">
                        <span class="pl-5 pr-2 text-slate-400 font-bold text-lg">Rp</span>
                        <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-4 outline-none font-bold text-slate-800 text-lg" placeholder="Min. 10.000" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 font-bold text-center tracking-[0.5em] text-lg shadow-inner transition-all" placeholder="••••••" required>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-purple-500/30 transition-all transform hover:-translate-y-0.5 mt-2">Top Up Sekarang</button>
            </form>
        @endif
    </div>

</body>
</html>