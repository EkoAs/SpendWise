<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Bank - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .input-transfer:focus-within {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2) !important;
        }
        /* Custom Scrollbar untuk grid bank jika layar sangat kecil */
        .hide-scroll::-webkit-scrollbar {
            display: none;
        }
        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-[#020617] text-white flex items-center justify-center min-h-screen relative overflow-x-hidden overflow-y-auto py-10 px-4">

    <!-- ================= BACKGROUND ORBS ================= -->
    <div class="fixed top-[-10%] left-[-10%] w-96 h-96 bg-[#6366f1] rounded-full mix-blend-screen filter blur-[120px] opacity-20 z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-96 h-96 bg-[#3b82f6] rounded-full mix-blend-screen filter blur-[120px] opacity-15 z-0 pointer-events-none"></div>

    <div class="w-full max-w-lg z-10 relative space-y-6">
        
        <!-- ================= HEADER LOGO & BACK ================= -->
        @if(!session('success'))
        <div class="flex items-center justify-between bg-[#0f172a]/70 backdrop-blur-md border border-[#334155]/50 px-6 py-4 rounded-[1.5rem] shadow-lg mb-4">
            <div class="flex items-center gap-4">
                <a href="{{ url('/dashboard') }}" class="text-[#94a3b8] hover:text-[#6366f1] transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </a>
                <!-- Logo SpendWise -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="text-base font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                </div>
            </div>
            <!-- Badge -->
            <div class="flex items-center gap-1.5 bg-[#6366f1]/10 border border-[#6366f1]/30 px-3 py-1.5 rounded-full">
                <span class="text-[10px] font-extrabold text-[#818cf8] uppercase tracking-wider">Transfer Bank</span>
            </div>
        </div>
        @endif

        <!-- ================= MAIN CARD ================= -->
        <div class="bg-[#0f172a]/70 backdrop-blur-[20px] p-6 sm:p-8 rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-[#334155]/50">
            
            <!-- ====== STATE: SUCCESS ====== -->
            @if(session('success'))
                <div class="text-center py-4">
                    <!-- Logo SpendWise (Center) -->
                    <div class="flex justify-center items-center gap-2 mb-8">
                        <div class="w-8 h-8 bg-[#3b82f6] rounded-full flex items-center justify-center shadow-[0_4px_10px_rgba(59,130,246,0.3)]">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-xl font-extrabold tracking-tight text-white">Spend<span class="text-[#3b82f6]">Wise</span></div>
                    </div>

                    <div class="w-20 h-20 bg-gradient-to-br from-[#10b981] to-[#059669] text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-5 shadow-[0_4px_20px_rgba(16,185,129,0.4)]">
                        <i class="fa-solid fa-check-double"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-white mb-2">Transfer Berhasil!</h2>
                    
                    <div class="bg-[#020617]/60 p-5 rounded-2xl mb-8 border border-[#334155]/50 shadow-inner mt-6 text-left">
                        <div class="flex items-center gap-3 mb-5 bg-[#6366f1]/10 border border-[#6366f1]/20 p-3 rounded-xl">
                            <i class="fa-solid fa-building-columns text-[#818cf8] text-xl"></i>
                            <p class="text-sm font-bold text-[#e2e8f0]">{{ session('success') }}</p>
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm font-bold text-[#64748b]">Waktu</span>
                            <span class="text-sm font-bold text-[#e2e8f0]">{{ now()->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-bold text-[#64748b]">Status</span>
                            <span class="text-xs font-extrabold text-[#10b981] bg-[#10b981]/10 border border-[#10b981]/30 px-2.5 py-1 rounded-md tracking-wider">SUKSES</span>
                        </div>
                    </div>

                    <a href="{{ url('/dashboard') }}" class="block w-full bg-gradient-to-r from-[#1e293b] to-[#334155] text-white font-bold py-4 rounded-xl hover:from-[#334155] hover:to-[#475569] transition-all shadow-md border border-[#475569]/50 text-center">
                        Kembali ke Dashboard
                    </a>
                </div>

            <!-- ====== STATE: FORM INPUT ====== -->
            @else
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-gradient-to-br from-[#6366f1] to-[#4f46e5] text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_4px_15px_rgba(99,102,241,0.3)]">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-white">Transfer Bank</h2>
                        <p class="text-sm text-[#94a3b8] font-medium">Kirim dana ke semua bank</p>
                    </div>
                </div>

                @if(session('error'))
                    <div class="p-4 mb-6 text-sm text-[#f87171] rounded-xl bg-[#ef4444]/10 backdrop-blur-sm font-bold border border-[#ef4444]/30 flex items-center gap-3">
                        <i class="fa-solid fa-circle-exclamation text-lg"></i> {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="p-4 mb-6 text-sm text-[#f87171] rounded-xl bg-[#ef4444]/10 backdrop-blur-sm font-bold border border-[#ef4444]/30">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('wallet.transfer.bank') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Pilihan Bank (10 Bank) -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-3">Pilih Bank Tujuan</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 max-h-56 overflow-y-auto hide-scroll pb-2">
                            
                            <!-- 1. BCA -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="BCA" class="peer sr-only" required>
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8] peer-checked:text-white">BCA</span>
                                </div>
                            </label>

                            <!-- 2. Mandiri -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="Mandiri" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_of_Bank_Mandiri.svg" alt="Mandiri" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">MANDIRI</span>
                                </div>
                            </label>

                            <!-- 3. BNI -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="BNI" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg" alt="BNI" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">BNI</span>
                                </div>
                            </label>

                            <!-- 4. BRI -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="BRI" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg" alt="BRI" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">BRI</span>
                                </div>
                            </label>

                            <!-- 5. BSI -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="BSI" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="BSI" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">BSI</span>
                                </div>
                            </label>

                            <!-- 6. CIMB Niaga -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="CIMB Niaga" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/CIMB_Niaga_logo.svg" alt="CIMB" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">CIMB NIAGA</span>
                                </div>
                            </label>

                            <!-- 7. Permata -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="Permata" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/PermataBank_logo.svg" alt="Permata" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">PERMATA</span>
                                </div>
                            </label>

                            <!-- 8. Danamon -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="Danamon" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Danamon_logo.svg" alt="Danamon" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">DANAMON</span>
                                </div>
                            </label>

                            <!-- 9. BTN -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="BTN" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/22/Bank_BTN_logo.svg" alt="BTN" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">BTN</span>
                                </div>
                            </label>

                            <!-- 10. Jago -->
                            <label class="cursor-pointer block relative">
                                <input type="radio" name="bank_name" value="Jago" class="peer sr-only">
                                <div class="p-2 bg-[#020617]/50 border-2 border-[#334155]/70 rounded-xl peer-checked:border-[#6366f1] peer-checked:bg-[#6366f1]/10 transition-all duration-200 flex flex-col items-center justify-center gap-2 h-20">
                                    <div class="bg-white w-full h-10 rounded flex items-center justify-center p-1.5">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4b/Bank_Jago_logo.svg" alt="Jago" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <span class="text-[10px] font-bold text-[#94a3b8]">JAGO</span>
                                </div>
                            </label>

                        </div>
                    </div>

                    <!-- Input Nomor Rekening -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nomor Rekening</label>
                        <div class="input-transfer flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                            <span class="pl-4 pr-2 text-[#64748b]"><i class="fa-solid fa-hashtag"></i></span>
                            <input type="number" name="account_number" class="w-full bg-transparent px-2 py-4 outline-none font-bold text-white text-lg placeholder-[#475569]" placeholder="Contoh: 1234567890" required>
                        </div>
                    </div>

                    <!-- Input Nominal -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2">Nominal Transfer</label>
                        <div class="input-transfer flex items-center w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl overflow-hidden transition-all duration-300">
                            <span class="pl-4 pr-2 text-[#64748b] font-bold text-lg">Rp</span>
                            <input type="number" name="amount" min="10000" class="w-full bg-transparent px-2 py-4 outline-none font-extrabold text-white text-lg placeholder-[#475569]" placeholder="Min. 10.000" required>
                        </div>
                    </div>

                    <!-- Input PIN -->
                    <div>
                        <label class="block text-sm font-semibold text-[#cbd5e1] mb-2 text-center">PIN SpendWise</label>
                        <input type="password" name="pin" maxlength="6" inputmode="numeric" class="input-transfer w-full bg-[#020617]/50 border border-[#334155]/70 rounded-xl px-4 py-4 outline-none font-bold text-center tracking-[0.6em] transition-all duration-300 text-xl text-white placeholder-[#475569]/50" placeholder="••••••" required>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full bg-gradient-to-r from-[#6366f1] to-[#4f46e5] hover:from-[#818cf8] hover:to-[#6366f1] text-white font-bold py-4 rounded-xl shadow-[0_4px_12px_rgba(99,102,241,0.2)] hover:shadow-[0_6px_20px_rgba(99,102,241,0.4)] transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2 mt-2">
                        <i class="fa-solid fa-paper-plane text-sm"></i> Kirim Sekarang
                    </button>
                </form>
            @endif
        </div>
    </div>
</body>
</html>