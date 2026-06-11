<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - SpendWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        
        /* Menghilangkan arrow pada input number (Chrome, Safari, Edge, Opera) */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* Menghilangkan arrow pada input number (Firefox) */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body class="bg-slate-950 min-h-screen flex items-center justify-center relative overflow-hidden p-4">

    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute top-[10%] left-[20%] w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-40 animate-blob"></div>
        <div class="absolute bottom-[10%] right-[20%] w-96 h-96 bg-emerald-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative z-10 w-full max-w-md bg-slate-900/80 backdrop-blur-2xl border border-slate-700/50 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] overflow-hidden p-10">
        
        <div class="flex justify-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-[0_0_30px_rgba(37,99,235,0.4)] transform rotate-3">
                <svg class="w-8 h-8 text-white transform -rotate-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-white mb-2">Verifikasi Keamanan</h2>
            <p class="text-slate-400 text-sm leading-relaxed">
                Masukkan 6 digit kode OTP yang telah kami kirimkan ke perangkat Anda. <br>
                <span class="text-emerald-400 font-semibold">(Dummy: 000000)</span>
            </p>
        </div>
        
        @if($errors->any())
            <div class="bg-rose-500/10 border border-rose-500/50 text-rose-400 p-4 rounded-xl mb-6 text-sm flex items-center justify-center gap-2">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('verify.process') }}" method="POST" id="otp-form" class="space-y-8">
            @csrf
            
            <input type="hidden" name="code" id="actual-otp-code" required>
            
            <div class="flex justify-between gap-2 sm:gap-3" id="otp-container">
                <input type="number" class="otp-input w-12 h-14 sm:w-14 sm:h-16 text-center text-2xl font-bold bg-slate-950/50 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="1" autofocus>
                <input type="number" class="otp-input w-12 h-14 sm:w-14 sm:h-16 text-center text-2xl font-bold bg-slate-950/50 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="1">
                <input type="number" class="otp-input w-12 h-14 sm:w-14 sm:h-16 text-center text-2xl font-bold bg-slate-950/50 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="1">
                <input type="number" class="otp-input w-12 h-14 sm:w-14 sm:h-16 text-center text-2xl font-bold bg-slate-950/50 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="1">
                <input type="number" class="otp-input w-12 h-14 sm:w-14 sm:h-16 text-center text-2xl font-bold bg-slate-950/50 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="1">
                <input type="number" class="otp-input w-12 h-14 sm:w-14 sm:h-16 text-center text-2xl font-bold bg-slate-950/50 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all shadow-inner" maxlength="1">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-bold py-4 px-4 rounded-xl shadow-[0_0_20px_rgba(16,185,129,0.3)] hover:shadow-[0_0_25px_rgba(16,185,129,0.5)] transform hover:-translate-y-0.5 transition-all duration-200">
                Verifikasi Sekarang
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-sm text-slate-400">
                Belum menerima kode? <br class="sm:hidden">
                <button type="button" id="resend-btn" class="font-bold text-slate-500 cursor-not-allowed transition-colors ml-1" disabled>
                    Kirim Ulang <span id="timer-text">(60s)</span>
                </button>
            </p>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const inputs = document.querySelectorAll('.otp-input');
            const hiddenInput = document.getElementById('actual-otp-code');
            const form = document.getElementById('otp-form');

            // Fungsi update hidden input untuk dikirim ke backend
            const updateHiddenInput = () => {
                const code = Array.from(inputs).map(input => input.value).join('');
                hiddenInput.value = code;
            };

            inputs.forEach((input, index) => {
                // Mencegah input lebih dari 1 angka per kotak
                input.addEventListener('input', (e) => {
                    if (input.value.length > 1) {
                        input.value = input.value.slice(0, 1);
                    }
                    updateHiddenInput();
                    
                    // Auto-focus ke kotak berikutnya jika sudah terisi
                    if (input.value !== '' && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                // Menangani tombol Backspace
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value === '' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });

                // Menangani Copy-Paste (memasukkan 6 digit sekaligus)
                input.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const pastedData = e.clipboardData.getData('text').slice(0, inputs.length).replace(/\D/g, '');
                    if (pastedData) {
                        pastedData.split('').forEach((char, i) => {
                            if (i < inputs.length) {
                                inputs[i].value = char;
                            }
                        });
                        updateHiddenInput();
                        // Focus ke kotak terakhir yang terisi
                        const lastFilledIndex = Math.min(pastedData.length - 1, inputs.length - 1);
                        inputs[lastFilledIndex].focus();
                    }
                });
            });

            // Logika Timer Kirim Ulang OTP
            let timeLeft = 60;
            const timerText = document.getElementById('timer-text');
            const resendBtn = document.getElementById('resend-btn');

            const countdown = setInterval(() => {
                timeLeft--;
                timerText.textContent = `(${timeLeft}s)`;

                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    timerText.textContent = '';
                    resendBtn.disabled = false;
                    
                    // Ubah gaya tombol menjadi aktif
                    resendBtn.classList.remove('text-slate-500', 'cursor-not-allowed');
                    resendBtn.classList.add('text-blue-400', 'hover:text-blue-300', 'hover:underline');
                }
            }, 1000);

            // Aksi saat tombol resend diklik (Bisa disambungkan dengan AJAX ke backend nantinya)
            resendBtn.addEventListener('click', () => {
                if(!resendBtn.disabled) {
                    alert('Kode OTP Dummy (000000) telah dikirim ulang!');
                    // Reset Timer (Opsional)
                    // window.location.reload(); 
                }
            });
        });
    </script>
</body>
</html>