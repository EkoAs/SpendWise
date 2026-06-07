<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPJS - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen relative overflow-hidden px-4">

    <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-emerald-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>

    <div class="w-full max-w-md bg-white/70 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white z-10">
        
        @if(session('success'))
            <div class="text-center py-4">
                <div class="w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-5 shadow-inner">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Pembayaran Berhasil!</h2>
                <p class="text-slate-600 mb-8 font-medium">{{ session('success') }}</p>
                
                <div class="bg-white/80 p-5 rounded-2xl mb-8 border border-slate-200 shadow-sm text-left">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-slate-400">Layanan</span>
                        <span class="text-sm font-bold text-slate-700">BPJS Kesehatan</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-slate-400">Tanggal</span>
                        <span class="text-sm font-bold text-slate-700">{{ now()->format('d M Y') }}</span>
                    </div>
                    <hr class="border-dashed border-slate-300 my-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-slate-400">Total Dibayar</span>
                        <span class="text-lg font-extrabold text-emerald-600">Rp 150.000</span>
                    </div>
                </div>

                <a href="{{ url('/dashboard') }}" class="block w-full bg-slate-800 text-white font-bold py-4 rounded-xl hover:bg-slate-900 transition-all shadow-md">
                    Kembali ke Dashboard
                </a>
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-emerald-600 mb-6 inline-block font-bold transition-colors">
                <i class="fa-solid fa-arrow-left mr-1"></i> Batal
            </a>
            
            <div class="flex items-center gap-4 mb-8 bg-emerald-50/50 p-4 rounded-2xl border border-emerald-100/50">
                <div class="w-14 h-14 bg-white shadow-sm text-emerald-500 rounded-xl flex items-center justify-center text-2xl">
                    <i class="fa-solid fa-kit-medical"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800">BPJS Kesehatan</h2>
                    <p class="text-sm text-slate-500 font-medium mt-0.5">Iuran Kelas 1: <span class="font-bold text-emerald-600">Rp 150.000</span></p>
                </div>
            </div>

            @if(session('error'))
                <div class="p-4 mb-6 text-sm text-red-800 rounded-xl bg-red-50/80 backdrop-blur-sm font-bold border border-red-200 flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                </div>
            @endif
            
            <form action="{{ route('wallet.bpjs') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">ID Pelanggan / VA BPJS</label>
                    <input type="number" name="bpjs_id" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 font-semibold text-slate-800 shadow-inner transition-all text-lg" placeholder="Contoh: 888880123456" required>
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">PIN Verifikasi</label>
                    <input type="password" name="pin" maxlength="6" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-4 outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 font-bold text-center tracking-[0.5em] text-lg shadow-inner transition-all" placeholder="••••••" required>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-emerald-500/30 transition-all transform hover:-translate-y-0.5 mt-2">
                    Bayar Tagihan
                </button>
            </form>
        @endif
    </div>

</body>
</html>