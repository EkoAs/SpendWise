<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Bank - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>

    <div class="w-full max-w-lg bg-white/70 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white z-10">
        
        @if(session('success'))
            <div class="text-center py-4">
                <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-inner">
                    <i class="fa-solid fa-check-double"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Transfer Berhasil!</h2>
                
                <div class="bg-white/80 p-5 rounded-2xl mb-8 border border-slate-200 shadow-sm mt-6">
                    <div class="flex items-center gap-3 mb-4 bg-indigo-50 p-3 rounded-xl">
                        <i class="fa-solid fa-building-columns text-indigo-500 text-xl"></i>
                        <p class="text-sm font-bold text-indigo-800 text-left">{{ session('success') }}</p>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-slate-400">Waktu</span>
                        <span class="text-sm font-bold text-slate-700">{{ now()->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-slate-400">Status</span>
                        <span class="text-xs font-extrabold text-green-600 bg-green-100 px-2 py-1 rounded-md">SUKSES</span>
                    </div>
                </div>

                <a href="{{ url('/dashboard') }}" class="block w-full bg-slate-800 text-white font-bold py-4 rounded-xl hover:bg-slate-900 transition-all shadow-md">
                    Kembali ke Dashboard
                </a>
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-indigo-600 mb-6 inline-block font-bold transition-colors">
                <i class="fa-solid fa-arrow-left mr-1"></i> Batal
            </a>
            
            <h2 class="text-3xl font-extrabold text-slate-800 mb-8 flex items-center gap-3">
                <div class="bg-indigo-100 text-indigo-500 p-3 rounded-xl"><i class="fa-solid fa-building-columns"></i></div>
                Transfer Bank
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
            
            <form action="{{ route('wallet.transfer.bank') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Bank Tujuan</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="bank_name" value="BCA" class="peer sr-only" required>
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50 text-center font-extrabold text-blue-800 shadow-sm transition-all hover:border-blue-300">BCA</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="bank_name" value="Mandiri" class="peer sr-only">
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-yellow-500 peer-checked:bg-yellow-50 text-center font-extrabold text-yellow-600 shadow-sm transition-all hover:border-yellow-300">MANDIRI</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="bank_name" value="BNI" class="peer sr-only">
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-orange-500 peer-checked:bg-orange-50 text-center font-extrabold text-orange-600 shadow-sm transition-all hover:border-orange-300">BNI</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="bank_name" value="BRI" class="peer sr-only">
                            <div class="p-4 bg-white/50 border-2 border-slate-200 rounded-xl peer-checked:border-blue-400 peer-checked:bg-blue-50 text-center font-extrabold text-blue-600 shadow-sm transition-all hover:border-blue-300">BRI</div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Rekening</label>
                    <input type="number" name="account_number" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-semibold text-slate-800 shadow-inner transition-all text-lg" placeholder="Contoh: 1234567890" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Transfer</label>
                    <div class="flex items-center w-full bg-white/80 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-indigo-500 overflow-hidden shadow-inner transition-all">
                        <span class="pl-5 pr-2 text-slate-400 font-bold text-lg">Rp</span>
                        <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-4 outline-none font-bold text-slate-800 text-lg" placeholder="Min. 10.000" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-bold text-center tracking-[0.5em] text-lg shadow-inner transition-all" placeholder="••••••" required>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-indigo-600 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-indigo-500/30 transition-all transform hover:-translate-y-0.5 mt-2">Kirim Sekarang</button>
            </form>
        @endif
    </div>

</body>
</html>