<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Akun - SpendWise</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-body">
    <div class="bg-orbs-container">
        <div class="orb orb-blue"></div>
        <div class="orb orb-indigo"></div>
    </div>

    <div class="auth-card" style="max-width: 500px; flex-direction: column;"> 
        <div class="auth-form-section" style="width: 100%; padding: 3rem;">
            <div class="form-header">
                <h2>Cari Akun Saya</h2>
                <p>Masukkan No. Handphone yang terdaftar untuk melihat detail informasi akunmu.</p>
            </div>
            
            @if($errors->any())
                <div class="error-alert">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('forgot.pin.verify') }}" method="POST" class="auth-form">
                @csrf
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="text" name="phone" placeholder="Contoh: 0812xxxxxx" required autofocus>
                </div>

                <button type="submit" class="btn-submit">Cari Akun</button>
            </form>
            
            <p class="auth-footer">
                Ingat PIN kamu? <a href="{{ route('login') }}">Kembali ke Login</a>
            </p>
        </div>
    </div>
</body>
</html>