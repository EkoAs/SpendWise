<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center p-4">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[300px] h-[300px] rounded-full mix-blend-multiply filter blur-[100px] top-[10%] left-[20%] bg-[#2563eb] opacity-20"></div>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/80 backdrop-blur-xl border border-[#334155]/50 p-8 rounded-[1.5rem] shadow-2xl z-10">
        
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-[#334155]/50">
            <div class="w-16 h-16 bg-gradient-to-br from-[#3b82f6] to-[#4f46e5] rounded-full flex items-center justify-center text-2xl font-bold shadow-lg">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div>
                <h1 class="text-xl font-bold">{{ auth()->user()->name }}</h1>
                <p class="text-[#94a3b8] text-sm">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <a href="{{ url('/dashboard') }}" class="w-full bg-[#1e293b] hover:bg-[#334155] text-white font-semibold py-3.5 px-4 rounded-xl transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>

            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full bg-red-500/10 hover:bg-red-500/20 text-red-500 border border-red-500/20 font-semibold py-3.5 px-4 rounded-xl transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
                </button>
            </form>
        </div>

    </div>
</body>
</html>