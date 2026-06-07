<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asuransi - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animasi Melayang untuk Latar Belakang */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float 8s ease-in-out infinite reverse; }
    </style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4 font-sans">

    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <i class="fa-solid fa-shield-halved text-[30vw] text-slate-200/50 -rotate-12 select-none"></i>
    </div>

    <div class="fixed top-[15%] left-[10%] text-6xl opacity-20 blur-[1px] animate-float pointer-events-none z-0 select-none">🛡️</div>
    <div class="fixed bottom-[20%] right-[10%] text-7xl opacity-20 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none">☂️</div>
    <div class="fixed top-[60%] left-[5%] text-7xl opacity-20 blur-[1px] animate-float pointer-events-none z-0 select-none">💙</div>
    <div class="fixed top-[10%] right-[15%] text-6xl opacity-20 blur-[2px] animate-float-delayed pointer-events-none z-0 select-none">🏥</div>

    <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-96 h-96 bg-cyan-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 z-0 pointer-events-none"></div>

    <div class="w-full max-w-md bg-white/70 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white z-10 relative text-center">
        
        @if(session('success'))
            <div class="py-2">
                <div class="w-20 h-20 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-inner">
                    <i class="fa-solid fa-shield-check"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Proteksi Aktif!</h2>
                <p class="text-slate-600 mb-6 font-medium">{{ session('success') }}</p>
                
                <div class="bg-white/80 p-5 rounded-2xl mb-8 border border-slate-200 shadow-sm text-left">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-slate-400">Layanan</span>
                        <span class="text-sm font-bold text-slate-700">Asuransi SpendWise</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-slate-400">Masa Berlaku</span>
                        <span class="text-sm font-bold text-slate-700">30 Hari Kedepan</span>
                    </div>
                    <hr class="border-dashed border-slate-300 my-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-slate-400">Total Premi</span>
                        <span class="text-lg font-extrabold text-blue-600">Rp 10.000</span>
                    </div>
                </div>

                <a href="{{ url('/dashboard') }}" class="block w-full bg-slate-800 text-white font-bold py-4 rounded-xl hover:bg-slate-900 transition-all shadow-md">
                    Kembali ke Dashboard
                </a>
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-blue-600 mb-6 flex justify-center font-bold transition-colors">
                <i class="fa-solid fa-arrow-left mr-2 mt-1"></i> Batal
            </a>
            
            <div class="w-20 h-20 bg-gradient-to-tr from-blue-400 to-cyan-400 text-white rounded-full flex items-center justify-center text-4xl mx-auto mb-4 shadow-lg shadow-blue-400/40 transform hover:scale-110 transition-transform">
                <i class="fa-solid fa-shield-heart"></i>
            </div>
            
            <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Asuransi SpendWise</h2>
            <p class="text-slate-500 text-sm mb-6 font-medium leading-relaxed">
                Pembayaran proteksi bulan ini telah ditetapkan sebesar <strong class="text-blue-600 font-extrabold bg-blue-50 px-2 py-1 rounded-md">Rp 10.000</strong>.
            </p>
            
            @if(session('error'))
                <div class="p-4 mb-6 text-sm text-red-800 rounded-xl bg-red-50/80 backdrop-blur-sm font-bold border border-red-200 flex items-center gap-3 text-left">
                    <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                </div>
            @endif
            
            <form action="{{ route('wallet.insurance') }}" method="POST" class="space-y-6 text-left">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN SpendWise</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-bold text-center tracking-[0.5em] text-lg shadow-inner transition-all" placeholder="••••••" required>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-blue-500/30 transition-all transform hover:-translate-y-0.5">
                    Bayar Premi Rp 10.000
                </button>
            </form>
        @endif
    </div>

</body>
</html>