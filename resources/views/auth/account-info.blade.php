<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Akun - SpendWise</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-body">
    <div class="bg-orbs-container">
        <div class="orb orb-emerald"></div>
    </div>

    <div class="auth-card" style="max-width: 500px; flex-direction: column;">
        <div class="auth-form-section" style="width: 100%; padding: 3rem;">
            <div class="form-header">
                <h2>Akun Ditemukan!</h2>
                <p>Berikut adalah detail informasi akun yang terdaftar dengan No. HP tersebut.</p>
            </div>

            <!-- Box Menampilkan Info Akun -->
            <div style="background: rgba(15, 23, 42, 0.4); border: 1px solid rgba(59, 130, 246, 0.3); padding: 1.5rem; border-radius: 1rem; margin-bottom: 1.5rem;">
                
                <div style="margin-bottom: 1rem;">
                    <span style="color: #94a3b8; font-size: 0.875rem;">Nama Lengkap:</span> <br> 
                    <strong style="color: white; font-size: 1.1rem;">{{ $user->name }}</strong>
                </div>

                <div style="margin-bottom: 1rem;">
                    <span style="color: #94a3b8; font-size: 0.875rem;">No. Handphone:</span> <br> 
                    <strong style="color: white; font-size: 1.1rem;">{{ $user->phone }}</strong>
                </div>

                <div style="margin-bottom: 1rem;">
                    <span style="color: #94a3b8; font-size: 0.875rem;">No. KTP (NIK):</span> <br> 
                    <strong style="color: white; font-size: 1.1rem;">{{ $user->ktp }}</strong>
                </div>

                <div style="padding-top: 1rem; border-top: 1px dashed rgba(255,255,255,0.1);">
                    <span style="color: #94a3b8; font-size: 0.875rem;">Status Keamanan:</span> <br> 
                    <strong style="color: #10b981; font-size: 0.9rem;">PIN Terenkripsi & Aman</strong>
                </div>
            </div>

            <a href="{{ route('login') }}" class="btn-submit" style="text-decoration: none; text-align: center; display: block;">Kembali ke Login</a>
            
        </div>
    </div>
</body>
</html>