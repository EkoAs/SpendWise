<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sibuk - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#020617] text-white min-h-screen flex items-center justify-center relative overflow-x-hidden overflow-y-auto p-4">

    <div class="fixed inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[-5%] left-[-10%] bg-[#2563eb] opacity-35"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] top-[30%] right-[-10%] bg-[#4f46e5] opacity-35"></div>
        <div class="absolute w-[250px] h-[250px] md:w-[384px] md:h-[384px] rounded-full mix-blend-multiply filter blur-[80px] md:blur-[128px] bottom-[-10%] left-[10%] bg-[#059669] opacity-25"></div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <h1 class="text-[12vw] font-black text-slate-800/20 -rotate-12 select-none tracking-tighter">SPENDWISE</h1>
    </div>

    <div class="w-full max-w-md bg-[#0f172a]/70 backdrop-blur-[20px] border border-[#334155]/50 p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] text-center z-10 relative">
        
        <div class="flex items-center justify-center gap-3 mb-8">
            <div class="w-10 h-10 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_10px_15px_-3px_rgba(59,130,246,0.3)]">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <span class="text-xl font-extrabold tracking-tight">Spend<span class="text-[#3b82f6]">Wise</span></span>
        </div>

        <h2 class="text-2xl font-bold mb-3 bg-gradient-to-r from-[#60a5fa] to-[#34d399] bg-clip-text text-transparent">
            Oops! Sistem Sedang Sibuk
        </h2>
        <p class="text-[#94a3b8] text-sm leading-relaxed mb-8">
            Server kami sedang memproses terlalu banyak permintaan atau kesulitan terhubung ke layanan luar. Jangan khawatir, data keuangan kamu tetap aman bersama kami.
        </p>

        <div class="flex flex-col gap-3.5">
            <button onclick="window.location.reload()" class="w-full bg-gradient-to-r from-[#2563eb] to-[#4f46e5] hover:from-[#3b82f6] hover:to-[#6366f1] text-white font-bold py-3.5 px-4 rounded-xl transition-all duration-200 shadow-[0_4px_12px_rgba(37,99,235,0.2)] hover:shadow-[0_6px_20px_rgba(37,99,235,0.4)] hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 cursor-pointer">
                <i class="fa-solid fa-rotate-right"></i> Refresh Browser
            </button>
            
            <a href="{{ url('/dashboard') }}" class="w-full bg-[#020617]/50 hover:bg-[#0f172a]/80 text-[#94a3b8] hover:text-[#60a5fa] border border-[#334155]/70 font-bold py-3.5 px-4 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 decoration-none">
                <i class="fa-solid fa-house"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="mt-8 text-xs text-[#64748b] font-semibold tracking-wider uppercase">
            Internal Server Error 500
        </div>

    </div>

</body>
</html>