<div align="center">
  <img src="https://api.iconify.design/heroicons:bolt-solid.svg?color=%233b82f6" width="80" height="80" alt="SpendWise Icon" />
  
  <h1>Spend<b>Wise</b></h1>
  <p><i>Sistem E-Wallet & Gerbang Pembayaran Premium</i></p>

  [![Version](https://img.shields.io/badge/version-24.0.0-blue.svg?style=for-the-badge)](#)
  [![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](#)
  [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](#)
  [![License](https://img.shields.io/badge/license-MIT-green.svg?style=for-the-badge)](#)
</div>

---

## 🚀 Tentang Project
**SpendWise** adalah platform dompet digital modern yang memfasilitasi transaksi pembayaran tagihan, dengan antarmuka *Dark Glassmorphism* yang elegan, aman, dan responsif.

## ✨ Fitur Utama
* 💸 **Top Up Cepat:** Dukungan ke berbagai provider (*Gopay, DANA, ShopeePay*).
* 🏥 **Pembayaran Lintas:** Cek dan bayar tagihan BPJS Kesehatan dalam hitungan detik.
* 🎨 **Premium UI/UX:** Dibangun dengan filosofi desain *Glassmorphism* bertema gelap.
* 🔒 **Keamanan Berlapis:** Validasi PIN 6-digit untuk setiap transaksi, dan verifikasi tambahan.
* 📊 **Pencatat Bulanan:** Memantau pengeluaran harian menggunakan grafik.

#
## DAFTAR FITUR
* 🧾 Bill
* 📱 WiseQris
* 🔢 Va
* 🌐 NetMarket
* 🏥 Bpjs
* 🛡️ AsuransiWise
* 💰 Loan
* 🏦 TransferBank
* 👛 TransferEwallet
* 🏧 Withdraw
* 💱 Currency



## 🛠️ Tech Stack
| Teknologi | Keterangan |
| :--- | :--- |
| **Backend** | Laravel 10.x / 11.x, PHP 8.2+, JS |
| **Frontend** | Blade Templates, Tailwind CSS, Vite |
| **Database** | MySQL |
| **Icons** | FontAwesome 6 & Heroicons |


---

## 📦 Persyaratan Sistem (Prerequisites)

Sebelum menjalankan aplikasi, pastikan sistem Anda telah terinstal perangkat lunak berikut:
* **PHP** (Minimal versi 8.1 atau 8.2 disarankan)
* **Composer** (Manajer dependensi PHP)
* **Node.js & NPM** (Untuk kompilasi aset Tailwind CSS)
* **MySQL** (Atau aplikasi bundle seperti XAMPP / Laragon)

---

## 🚀 Panduan Instalasi & Menjalankan (Run Guide)

Berikut adalah langkah-langkah lengkap dari awal *clone* hingga aplikasi siap diakses di *browser*:

### Kloning Repositori
Buka terminal/CMD dan jalankan perintah berikut:
```bash
git clone [https://github.com/EkoAs/SpendWise.git](https://github.com/EkoAs/SpendWise.git)

cd SpendWise

2. Install Dependensi Backend & Frontend
Install semua package PHP dan Javascript yang dibutuhkan:

Bash
composer install
npm install


3. Konfigurasi Environment
Buat file konfigurasi environment berdasarkan file example yang disediakan, lalu generate kunci enkripsi Laravel:

cp .env.example .env
php artisan key:generate

4. Konfigurasi Database
Buka file .env di code editor Anda, lalu sesuaikan kredensial database (pastikan Anda sudah membuat database kosong bernama spendwise di MySQL/PhpMyAdmin):

Code snippet
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spendwise
DB_USERNAME=root
DB_PASSWORD=


5. Migrasi & Seeding Database
Buat tabel-tabel yang diperlukan dan isi dengan data dummy awal (opsional jika Anda memiliki seeder):
php artisan migrate --seed


6. Jalankan Server (Build Asset & Serve)
Untuk menjalankan project Laravel yang menggunakan Vite (Tailwind CSS), Anda perlu menjalankan dua perintah di terminal yang berbeda.

Terminal 1 (Untuk kompilasi CSS/JS secara real-time):
npm run dev
(Jika ingin di-build untuk production, gunakan npm run build)

Terminal 2 (Untuk menjalankan server PHP Laravel):
php artisan serve

7. Selesai 🎉
Buka browser Anda dan kunjungi:
👉 http://localhost:8000/register