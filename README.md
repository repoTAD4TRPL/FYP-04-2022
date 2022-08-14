# FYP-04-2022
Project repository for group 04


## Panduan Instalasi
### Topik Proyek			: 
    Pengembangan Aplikasi E-Commerce Lobster Di Kawasan Danau Toba Berbasis Android
### Nama Sistem atau Aplikasi	: 
    TobaLobs
### Jenis Sistem atau Aplikasi	: 
    Mobile dan Web
### Spesifikasi	:
- Windows 10
- Installed Memory (RAM) 8 Gb
- Processor Intel® Core(TM) i5
### Tools		:
- XAMPP
- Visual Studio Code
- Android Studio V 2021.2.1 Patch 1
- Composer
- Laravel V5.8.38
- Chrome atau aplikasi sejenis
- MySQL
- Nox Emulator
### Konfigurasi untuk menjalankan web dan mobile
- Melakukan penyesuaian versi Composer
- Melakukan penyesuaian versi Laravel
- Melakukan penyesuaian versi Android Studio
### Daftar User Type
#### 1. Admin
User Admin berfungsi untuk mengelola produk, mengelola pesanan, membuat history tangkapan. Untuk dapat masuk ke web, akun admin sudah dibuat terlebih dahulu, namun admin dapat melakukan registrasi akun pada sistem.

#### 2. Pembeli
User Pembeli berfungsi untuk melakukan pembelian produk, melakukan pembayaran, dan upload bukti pembayaran. Untuk mengakses aplikasi, pembeli dapat melakukan registrasi akun.

### Langkah - Langkah menjalankan Website
- Akses link repository yang akan di clone
     https://github.com/repoTAD4TRPL/FYP-04-2022
- Klik Button “Code”. Lalu copy link yang disediakan seperti pada gambar.
- Tetapkan lokasi folder yang akan digunakan yaitu xampp/htdocs, kemudian buat folder baru untuk repository yang akan kita clone. 
- Ketik “cmd” pada path folder.
- Kemudian ketikkan perintah berikut “git clone” diikuti dengan link yang telah dicopy.
- Kemudian buka project yang telah di clone.
- Buka terminal, dan ketik perintah :
        "composer update"
- Kemudian buat file .env baru, copy semua isi file pada file .env.example ke file .env yang baru, kemudian ketikkan perintah :
        "php artisan key:generate"
- Kemudian buka XAMPP, aktifkan Apache dan MySQL
- Buat database baru. Kemudian konfigurasi pada file .env, sesuaikan DB_DATABASE dengan database yang dibuat.
- Lakukan migrasi database atau dapat menggunakan perintah :
        "php artisan migrate"
- Kemudian jalankan seeder atau dapat menggunakan perintah :
        "php artisan db:seed"
- Kemudian run project atau dapat menggunakan perintah :
        "php artisan serve"
