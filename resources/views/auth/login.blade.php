<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SpendWise</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-body">

    <div class="bg-orbs-container">
        <div class="orb orb-blue"></div>
        <div class="orb orb-indigo"></div>
        <div class="orb orb-emerald"></div>
    </div>

    <div class="auth-card">
        
        <div class="auth-brand-section">
            <div class="brand-logo">
                <div class="logo-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="brand-text">Spend<span>Wise</span></div>
            </div>

            <div class="brand-hero">
                <h1>Selamat Datang <br><span class="text-gradient">Kembali!</span></h1>
                <p>Masuk untuk memantau arus kas, mengecek limit anggaran, dan mengendalikan keuanganmu hari ini dengan presisi.</p>
            </div>

            <div class="brand-sponsors">
                <div class="sponsor-title">Berlisensi & Diawasi Oleh</div>
                <div class="sponsor-logos main-sponsors">
                    <div class="ojk-logo">
                        <div class="circle-icon"><div class="dot"></div></div>
                        <span>OJK</span>
                    </div>
                    <div class="bi-logo">
                        <span>B I</span>
                    </div>
                    <div class="lps-logo">
                        <span>LPS</span>
                    </div>
                </div>
                
                <div class="sponsor-title mt-4 flex items-center" style="display: flex; align-items: center; gap: 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; color: #34d399;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Enkripsi End-to-End 256-bit
                </div>
            </div>
        </div>

        <div class="auth-form-section">
            
            <div class="form-header">
                <h2>Masuk ke Akunmu</h2>
                <p>Silakan masukkan No. HP dan PIN kamu yang terdaftar.</p>
            </div>
            
            @if($errors->any())
                <div class="error-alert">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="auth-form">
                @csrf
                
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="text" name="phone" placeholder="08123456789" required>
                </div>

                <div class="form-group">
                    <div class="label-with-hint">
                        <label>PIN Keamanan</label>
                        <a href="{{ route('forgot.pin') }}" class="hint" style="color: #60a5fa; text-decoration: none; transition: 0.2s;">Lupa PIN?</a>
                    </div>
                    <input type="password" name="pin" class="pin-input" maxlength="6" placeholder="******" required>
                </div>

                <button type="submit" class="btn-submit">
                    Masuk ke SpendWise
                </button>
            </form>
            
            <div class="auth-footer">
                Belum punya akun? 
                <a href="{{ route('register') }}">Register Sekarang</a>
            </div>
            
        </div>
    </div>

</body>
</html>