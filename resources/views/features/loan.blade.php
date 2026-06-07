<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WisePinjam - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 flex flex-col items-center justify-start min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4 font-sans">

    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[11vw] font-black text-slate-200/50 -rotate-12 select-none tracking-tighter">WISEPINJAM</h1>
    </div>

    <div class="fixed top-[8%] left-[5%] pointer-events-none z-0 select-none opacity-20 transform -rotate-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-building-shield text-5xl"></i>
            <div>
                <h2 class="text-4xl font-extrabold tracking-tighter leading-none text-slate-800">OJK</h2>
                <p class="text-[10px] font-bold tracking-widest text-slate-800">OTORITAS JASA KEUANGAN</p>
            </div>
        </div>
    </div>

    <div class="fixed bottom-[10%] right-[5%] pointer-events-none z-0 select-none opacity-20 transform rotate-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-landmark-flag text-5xl"></i>
            <div>
                <h2 class="text-4xl font-extrabold tracking-tighter leading-none text-slate-800">BI</h2>
                <p class="text-[10px] font-bold tracking-widest text-slate-800">BANK INDONESIA</p>
            </div>
        </div>
    </div>

    <div class="fixed top-[-10%] right-[-10%] w-96 h-96 bg-amber-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-96 h-96 bg-slate-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 z-0 pointer-events-none"></div>

    <div class="w-full max-w-lg z-10 relative space-y-6">
        
        <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-amber-600 font-bold transition-colors inline-block mb-2">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Dashboard
        </a>

        @if(session('success'))
            <div class="bg-green-50/90 backdrop-blur-sm border border-green-200 text-green-800 p-4 rounded-2xl font-bold flex items-center gap-3 shadow-sm">
                <i class="fa-solid fa-circle-check text-xl"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50/90 backdrop-blur-sm border border-red-200 text-red-800 p-4 rounded-2xl font-bold flex items-center gap-3 shadow-sm">
                <i class="fa-solid fa-circle-exclamation text-xl"></i> {{ session('error') }}
            </div>
        @endif

        <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-amber-500/30">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-800">Ajukan Pinjaman</h2>
                    <p class="text-sm text-slate-500 font-medium">Limit maksimal Rp 20.000.000</p>
                </div>
            </div>
            
            <form action="{{ route('wallet.loan.borrow') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Pinjaman</label>
                    <div class="flex items-center w-full bg-white/90 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-amber-500 focus-within:border-amber-500 overflow-hidden shadow-inner transition-all">
                        <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                        <input type="number" name="amount" max="20000000" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-slate-800 text-lg" placeholder="Maks. 20 Juta" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN Keamanan</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/90 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-bold text-center tracking-[0.5em] shadow-inner transition-all text-lg" placeholder="••••••" required>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-amber-500/30 transition-all transform hover:-translate-y-0.5">
                    Cairkan Pinjaman
                </button>
            </form>
        </div>

        <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-slate-600 to-slate-800 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-slate-600/30">
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-800">Bayar Cicilan</h2>
                    <p class="text-sm text-slate-500 font-medium">Bebaskan beban tagihanmu</p>
                </div>
            </div>
            
            <form action="{{ route('wallet.loan.pay') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nominal Pembayaran</label>
                    <div class="flex items-center w-full bg-white/90 border border-slate-200 rounded-xl focus-within:ring-2 focus-within:ring-slate-600 focus-within:border-slate-600 overflow-hidden shadow-inner transition-all">
                        <span class="pl-4 pr-2 text-slate-400 font-bold">Rp</span>
                        <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-slate-800 text-lg" placeholder="Min. 10.000" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN Keamanan</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/90 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-slate-600 focus:border-slate-600 font-bold text-center tracking-[0.5em] shadow-inner transition-all text-lg" placeholder="••••••" required>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-slate-700 to-slate-900 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-slate-700/30 transition-all transform hover:-translate-y-0.5">
                    Bayar Cicilan
                </button>
            </form>
        </div>
        
        <div class="text-center pt-2 pb-6">
            <p class="text-xs text-slate-400 font-bold flex items-center justify-center gap-2">
                <i class="fa-solid fa-shield-halved text-green-500"></i> Berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK)
            </p>
        </div>

    </div>

</body>
</html>