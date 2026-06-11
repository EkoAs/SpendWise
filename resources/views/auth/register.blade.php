<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SpendWise</title>
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
            
            <a href="{{ route('dashboard') }}" class="nav-brand">
                <div class="logo-icon-dash">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="brand-name">SpendWise</span>
            </a>

            <div class="brand-hero">
                <h1>Kendalikan Uangmu, <br><span class="text-gradient">Tanpa Batas.</span></h1>
                <p>Bergabung dengan jutaan pengguna lainnya. Nikmati bebas biaya admin, transfer instan, dan pantau pengeluaran dengan cerdas.</p>
            </div>

            <div class="brand-sponsors">
                <p class="sponsor-title">Berlisensi & Diawasi Oleh</p>
                <div class="sponsor-logos main-sponsors">
                    <div class="ojk-logo">
                        <div class="circle-icon"><div class="dot"></div></div>
                        <span>OJK</span>
                    </div>
                    <div class="bi-logo"><span>B I</span></div>
                    <div class="lps-logo"><span>LPS</span></div>
                </div>

                <p class="sponsor-title mt-4">Mitra Jaringan</p>
                <div class="sponsor-logos network-sponsors">
                    <span class="visa">VISA</span>
                    <span class="mastercard">mastercard</span>
                    <span class="gpn">GPN</span>
                </div>
            </div>
        </div>

        <div class="auth-form-section">
            
            <div class="form-header">
                <h2>Buat Akun Baru</h2>
                <p>Lengkapi data diri di bawah ini untuk memulai.</p>
            </div>
            
            @if($errors->any())
                <div class="error-alert">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST" class="auth-form">
                @csrf
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Sesuai KTP" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="text" name="phone" placeholder="0812xxxxxx" required>
                    </div>
                    
                    <div class="form-group">
                        <label>No. KTP</label>
                        <input type="text" name="ktp" placeholder="16 Digit NIK" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="label-with-hint">
                        <label>Set PIN Keamanan</label>
                        <span class="hint">Wajib 6 Angka</span>
                    </div>
                    <input type="password" name="pin" maxlength="6" placeholder="••••••" class="pin-input" required>
                </div>

                <button type="submit" class="btn-submit">Daftar Sekarang</button>
            </form>
            
            <p class="auth-footer">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}">Masuk ke SpendWise</a>
            </p>
            
        </div>
    </div>

</body>
</html>