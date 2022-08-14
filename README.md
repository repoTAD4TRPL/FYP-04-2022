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
- 1. Windows 10
- 2. Installed Memory (RAM) 8 Gb
- 3. Processor Intel® Core(TM) i5
### Tools		:
- 1. XAMPP
- 2. Visual Studio Code
- 3. Android Studio V 2021.2.1 Patch 1
- 4. Composer
- 5. Laravel V5.8.38
- 6. Chrome atau aplikasi sejenis
- 7. MySQL
- 8. Nox Emulator
### Konfigurasi untuk menjalankan web dan mobile
- 1. Melakukan penyesuaian versi Composer
- 2. Melakukan penyesuaian versi Laravel
- 3. Melakukan penyesuaian versi Android Studio
### Daftar User Type
- 1. Admin
User Admin berfungsi untuk mengelola produk, mengelola pesanan, membuat history tangkapan. Untuk dapat masuk ke web, akun admin sudah dibuat terlebih dahulu, namun admin dapat melakukan registrasi akun pada sistem.

email : adminTA@gmai.com
password : 12345678

- 2. Pembeli
User Pembeli berfungsi untuk melakukan pembelian produk, melakukan pembayaran, dan upload bukti pembayaran. Untuk mengakses aplikasi, pembeli dapat melakukan registrasi akun.

Langkah - Langkah menjalankan Website
- 1. Akses link repository yang akan di clone
     https://github.com/repoTAD4TRPL/FYP-04-2022
- 2. Klik Button “Code”. Lalu copy link yang disediakan seperti pada gambar.
- 3. Tetapkan lokasi folder yang akan digunakan yaitu xampp/htdocs, kemudian buat folder baru untuk repository yang akan kita clone. 
- 4. Ketik “cmd” pada path folder.
- 5. Kemudian ketikkan perintah berikut “git clone” diikuti dengan link yang telah dicopy.
- 6. Kemudian buka project yang telah di clone.
- 7. Buka terminal, dan ketik perintah :
        composer update
- 8. Kemudian buat file .env baru, copy semua isi file pada file .env.example, kemudian ketikkan perintah :
        php artisan key:generate
- 9. Kemudian buka XAMPP, aktifkan Apache dan MySQL
- 10. Buat database baru. Kemudian konfigurasi pada file .env, sesuaikan DB_DATABASE dengan database yang dibuat.
- 11. Lakukan migrasi database atau dapat menggunakan perintah :
        php artisan migrate
- 12. Kemudian jalankan seeder atau dapat menggunakan perintah :
        php artisan db:seed
- 13. Kemudian run project atau dapat menggunakan perintah :
        php artisan serve
