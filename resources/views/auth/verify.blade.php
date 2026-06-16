<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - SpendWise</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/verify.css') }}">
</head>
<body class="verify-body">

    <div class="verify-bg-container">
        <div class="verify-orb orb-top-left"></div>
        <div class="verify-orb orb-bottom-right"></div>
    </div>

    <div class="verify-card">
        
        <div class="verify-icon-wrapper">
            <div class="verify-icon-bg">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
        </div>

        <div class="verify-header">
            <h2>Verifikasi Keamanan</h2>
            <p>
                Masukkan 6 digit kode OTP yang telah kami kirimkan ke perangkat Anda. <br>
                <span class="text-emerald">(KODE: 873610)</span>
            </p>
        </div>
        
        @if($errors->any())
            <div class="verify-error">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('verify.process') }}" method="POST" id="otp-form" class="verify-form">
            @csrf
            
            <input type="hidden" name="code" id="actual-otp-code" required>
            
            <div class="otp-container" id="otp-container">
                <input type="number" class="otp-input" maxlength="1" autofocus>
                <input type="number" class="otp-input" maxlength="1">
                <input type="number" class="otp-input" maxlength="1">
                <input type="number" class="otp-input" maxlength="1">
                <input type="number" class="otp-input" maxlength="1">
                <input type="number" class="otp-input" maxlength="1">
            </div>

            <button type="submit" class="btn-verify">
                Verifikasi Sekarang
            </button>
        </form>

        <div class="verify-footer">
            <p>
                Belum menerima kode? <br class="br-mobile-only">
                <button type="button" id="resend-btn" class="btn-resend disabled" disabled>
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
                    
                    // PENGGANTIAN CLASS: Ubah gaya tombol menjadi aktif menggunakan class verify.css
                    resendBtn.classList.remove('disabled');
                    resendBtn.classList.add('active');
                }
            }, 1000);

            // Aksi saat tombol resend diklik
            resendBtn.addEventListener('click', () => {
                if(!resendBtn.disabled) {
                    alert('Kode OTP telah dikirim ulang!');
                }
            });
        });
    </script>
</body>
</html>