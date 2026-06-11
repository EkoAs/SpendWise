<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SpendWise</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>
<body>
<!-- Wrapper Utama dengan background abu-abu kebiruan yang sangat soft -->
    <nav class="dash-navbar">


    <div class="dash-brand">
    <div class="brand-icon">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
    </div>
    <div class="brand-text">Spend<span>Wise</span></div>
</div>


    <div class="dash-nav-actions">
        <div class="notif-btn" style="position: relative; cursor: pointer;">
            <i class="fa-solid fa-bell"></i>
            <span class="notif-badge" id="navNotifBadge" style="display: none;">0</span>
        </div>
        <div class="user-avatar">
            {{ substr($user->name, 0, 1) }}
        </div>
    </div>
</nav>

<div class="dash-wrapper">
    
    <aside class="dash-left-panel">
        <div class="money-bg-animation">
            <div class="money-blob blob-1"></div>
            <div class="money-blob blob-2"></div>
            <div class="money-blob blob-3"></div>
        </div>

        <div class="panel-content">
            <div class="welcome-badge">
                👋 Hai, <span>{{ $user->name }}</span>!
            </div>
            
            <p class="balance-label">Total Saldo Aktif</p>
            
            <div class="balance-wrapper">
                <h2 class="balance-amount" id="balanceText" data-balance="Rp {{ number_format($user->balance, 0, ',', '.') }}">
                    Rp {{ number_format($user->balance, 0, ',', '.') }}
                </h2>
                <button onclick="toggleBalance()" class="btn-eye" id="eyeBtn">
                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                </button>
            </div>

            <div class="currency-card">
                <div class="currency-item">
                    <img src="https://flagcdn.com/w20/us.png" alt="USD">
                    <span id="usd-val">Memuat...</span>
                </div>
                <div class="currency-item">
                    <img src="https://flagcdn.com/w20/eu.png" alt="EUR">
                    <span id="eur-val">Memuat...</span>
                </div>
                <div class="currency-item no-border">
                    <img src="https://flagcdn.com/w20/sg.png" alt="SGD">
                    <span id="sgd-val">Memuat...</span>
                </div>
            </div>
            
        </div>
    </aside>

    <main class="dash-right-panel">
        
        <section class="dash-section">
            <div class="menu-grid">
                
                <a href="{{ route('transfer') }}" class="menu-card color-blue">
                    <div class="menu-icon">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <span>Transfer</span>
                </a>

                <a href="{{ route('va') }}" class="menu-card color-emerald">
                    <div class="menu-icon">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <span>Bayar VA</span>
                </a>

                <a href="{{ route('topup') }}" class="menu-card color-orange">
                    <div class="menu-icon">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <span>Top Up</span>
                </a>

                <a href="{{ route('bill') }}" class="menu-card color-rose">
                    <div class="menu-icon">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                    <span>Tagihan</span>
                </a>

                <a href="{{ route('netmarket') }}" class="menu-card color-purple">
                    <div class="menu-icon">
                        <i class="fa-solid fa-wifi"></i>
                    </div>
                    <span>NetMarket</span>
                </a>

                <a href="{{ route('qris') }}" class="menu-card color-teal">
                    <div class="menu-icon">
                        <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <span>WiseQris</span>
                </a>

                <a href="{{ route('view.loan') }}" class="menu-card color-amber">
                    <div class="menu-icon">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <span>WisePinjam</span>
                </a>

                <a href="{{ route('view.insurance') }}" class="menu-card color-blue">
                    <div class="menu-icon">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>
                    <span>Asuransi</span>
                </a>

                <a href="{{ route('view.bpjs') }}" class="menu-card color-emerald">
                    <div class="menu-icon">
                        <i class="fa-solid fa-kit-medical"></i>
                    </div>
                    <span>BPJS</span>
                </a>

                <a href="{{ route('view.transfer.bank') }}" class="menu-card color-indigo">
                    <div class="menu-icon">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <span>Bank</span>
                </a>

                <a href="{{ route('view.transfer.ewallet') }}" class="menu-card color-purple">
                    <div class="menu-icon">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <span>E-Wallet</span>
                </a>

                <a href="{{ route('view.withdraw') }}" class="menu-card color-rose">
                    <div class="menu-icon">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <span>Tarik Tunai</span>
                </a>

                <a href="{{ route('wallet.currency') }}" class="menu-card color-sky">
                    <div class="menu-icon">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <span>Valas</span>
                </a>

            </div>
        </section>


        <section class="dash-section">
            <h3 class="section-title"><i class="fa-solid fa-clock-rotate-left"></i> Log Transaksi Terbaru</h3>
            <div class="transaction-list">
                @forelse($transactions as $trx)
                    @php
                        $isIncome = $trx->type === 'topup';
                        $trxType = $isIncome ? 'income' : 'expense';
                        $sign = $isIncome ? '+' : '-';
                    @endphp
                    <div class="trx-card {{ $trxType }}">
                        <div class="trx-info">
                            <div class="trx-icon">
                                <i class="fa-solid {{ $isIncome ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i>
                            </div>
                            <div>
                                <p class="trx-desc">{{ $trx->description }}</p>
                                <p class="trx-date">{{ $trx->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        <div class="trx-amount">
                            {{ $sign }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fa-solid fa-box-open"></i>
                        <p>Belum ada transaksi bulan ini.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <section class="dash-section grid-2-cols">
            
            <div class="glass-panel">
                <div class="panel-watermark"><i class="fa-solid fa-folder-plus"></i></div>
                <h3 class="panel-title text-blue"><i class="fa-solid fa-folder-plus"></i> Buat Anggaran Baru</h3>
                <form action="{{ route('budget.store') }}" method="POST" class="dash-form">
                    @csrf
                    <input type="text" name="category" placeholder="Cth: Makan, Kost, Transport..." class="dash-input" required>
                    <input type="number" name="limit_amount" placeholder="Limit Maksimal (Rp)" class="dash-input" required>
                    <button type="submit" class="dash-btn btn-blue">Simpan Anggaran</button>
                </form>
            </div>

            <div class="glass-panel">
                <div class="panel-watermark"><i class="fa-solid fa-pen"></i></div>
                <h3 class="panel-title text-rose"><i class="fa-solid fa-pen"></i> Catat Pengeluaran</h3>
                <form action="{{ route('expense.store') }}" method="POST" class="dash-form">
                    @csrf
                    <select name="budget_id" class="dash-input select-dark" required>
                        <option value="" disabled selected>Pilih Kategori Anggaran</option>
                        @foreach($budgets as $budget)
                            <option value="{{ $budget->id }}">{{ $budget->category }} (Sisa: Rp {{ number_format($budget->limit_amount - $budget->spent_amount, 0, ',', '.') }})</option>
                        @endforeach
                    </select>
                    <div class="form-row">
                        <input type="number" name="amount" placeholder="Nominal (Rp)" class="dash-input w-half" required>
                        <input type="text" name="description" placeholder="Keterangan" class="dash-input w-half" required>
                    </div>
                    <button type="submit" class="dash-btn btn-rose">Catat ke Grafik</button>
                </form>
            </div>
        </section>

        <section class="dash-section grid-2-cols">
            <div class="glass-panel text-center">
                <h3 class="panel-title justify-center">📊 Pengeluaran vs Limit</h3>
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="glass-panel text-center">
                <h3 class="panel-title justify-center">🍩 Distribusi Anggaran</h3>
                <div class="chart-container chart-pie">
                    <div class="chart-wrapper">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <section class="dash-section mt-8">
            <h3 class="section-title"><i class="fa-solid fa-sliders"></i> Kelola Anggaran Saat Ini</h3>
            <div class="budget-grid">
                @forelse($budgets as $budget)
                    <div class="budget-card">
                        <div class="budget-header">
                            <div>
                                <h4>{{ $budget->category }}</h4>
                                <p>Terpakai: Rp {{ number_format($budget->spent_amount, 0, ',', '.') }}</p>
                            </div>
                            <form action="{{ route('budget.destroy', $budget->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori anggaran {{ $budget->category }}? Grafik pengeluaran juga akan ikut hilang.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete-icon"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                        <form action="{{ route('budget.update', $budget->id) }}" method="POST" class="budget-update-form">
                            @csrf @method('PUT')
                            <div class="input-group">
                                <span class="currency-symbol">Rp</span>
                                <input type="number" step="any" name="limit_amount" value="{{ $budget->limit_amount }}" required class="dash-input-inline">
                            </div>
                            <button type="submit" class="btn-update-small">Update</button>
                        </form>
                    </div>
                @empty
                    <div class="empty-state full-width">
                        <i class="fa-solid fa-box-open"></i>
                        Belum ada anggaran yang dibuat. Buat anggaran pertamamu di atas!
                    </div>
                @endforelse
            </div>
        </section>

    </main>
</div>

<footer class="dash-footer">
    <div class="footer-content">
        <p class="footer-copy">&copy; 2026 SpendWise E-Wallet. Secured & Supported By:</p>
        <div class="sponsor-marquee">
            <div class="sponsor-logos">
                <div class="sponsor-item"><i class="fa-brands fa-alipay"></i> Alibaba</div>
                <div class="sponsor-item"><i class="fa-brands fa-cc-visa"></i> VISA</div>
                <div class="sponsor-item"><i class="fa-brands fa-cc-mastercard"></i> MasterCard</div>
                <div class="sponsor-item text-bold">DANA</div>
                <div class="sponsor-item text-bold italic">OVO</div>
                <div class="sponsor-item text-bold">GoPay</div>
                <div class="sponsor-item text-bold">ShopeePay</div>
                <div class="sponsor-item border-left">Bank Indonesia</div>
                <div class="sponsor-item">OJK</div>
                <div class="sponsor-item">LPS</div>
            </div>
        </div>
    </div>
</footer>

<script>
    // Menyisipkan pengaturan global Chart.js jika script chart.js sudah di-load di atas
    document.addEventListener('DOMContentLoaded', function() {
        if(window.Chart) {
            Chart.defaults.color = '#94a3b8'; // text-slate-400
            Chart.defaults.borderColor = 'rgba(51, 65, 85, 0.4)'; // grid lines
            Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
        }
    });
</script>
    <script>
        let isHidden = false;
        function toggleBalance() {
            const balanceEl = document.getElementById('balanceText');
            const iconEl = document.getElementById('eyeIcon');
            const realBalance = balanceEl.getAttribute('data-balance');
            
            if (isHidden) {
                balanceEl.innerText = realBalance;
                iconEl.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                balanceEl.innerText = 'Rp *******';
                iconEl.classList.replace('fa-eye', 'fa-eye-slash');
            }
            isHidden = !isHidden;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($chartLabels) !!};
        const spentData = {!! json_encode($chartSpent) !!};
        const limitData = {!! json_encode($chartLimit) !!};

        // Konfigurasi Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    { label: 'Terpakai (Rp)', data: spentData, backgroundColor: 'rgba(239, 68, 68, 0.7)' },
                    { label: 'Limit (Rp)', data: limitData, backgroundColor: 'rgba(59, 130, 246, 0.3)' }
                ]
            },
            options: { responsive: true }
        });

        // Konfigurasi Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: spentData,
                    backgroundColor: ['#ef4444', '#f59e0b', '#10b981', '#3b82f6', '#8b5cf6']
                }]
            },
            options: { responsive: true }
        });
    </script>
    <script>
        async function fetchCurrency() {
            try {
                // Menggunakan public API gratis untuk kurs IDR
                let response = await fetch('https://api.exchangerate-api.com/v4/latest/IDR');
                let data = await response.json();
                
                // Ambil saldo user dari Laravel
                let balance = {{ $user->balance }};
                
                // Hitung konversi dan tampilkan
                document.getElementById('usd-val').innerText = '$' + (balance * data.rates.USD).toFixed(2);
                document.getElementById('eur-val').innerText = '€' + (balance * data.rates.EUR).toFixed(2);
                document.getElementById('sgd-val').innerText = 'S$' + (balance * data.rates.SGD).toFixed(2);
            } catch (error) {
                console.log('Gagal mengambil data kurs');
                document.getElementById('usd-val').innerText = 'Error';
                document.getElementById('eur-val').innerText = 'Error';
                document.getElementById('sgd-val').innerText = 'Error';
            }
        }
        fetchCurrency();
    </script>


    <script> // ambil notif real time untuk navbar
        function updateNavbarNotification() {
            // Memanggil route API yang sudah kita daftarkan di web.php
            fetch("{{ route('api.notif.count') }}")
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById('navNotifBadge');
                    
                    if (badge) {
                        if (data.count > 0) {
                            badge.textContent = data.count;
                            badge.style.display = 'flex'; // Menampilkan badge jika ada notifikasi
                        } else {
                            badge.style.display = 'none';  // Tetap sembunyi jika 0
                        }
                    }
                })
                .catch(error => console.error('Gagal mengambil data notifikasi:', error));
        }

        // Jalankan pengecekan begitu halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            updateNavbarNotification();

            // Polling Real-time: Sistem akan otomatis cek ulang setiap 10 detik
            setInterval(updateNavbarNotification, 10000);
        });
    </script>

</body>
</html>