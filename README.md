# Aplikasi Blog - Tugas UAS Pemrograman Web

### Identitas Mahasiswa
* **Nama Lengkap:** Rizqi Akbar
* **NIM:** 240605110261

### Deskripsi Singkat Aplikasi
Aplikasi ini adalah Sistem Manajemen Blog (CMS) dan Halaman Publik Pengunjung yang dibangun menggunakan framework Laravel dan database MySQL (db_blog). Fitur utama meliputi manajemen penulis, kategori, artikel (CRUD) melalui halaman admin yang terproteksi login, serta halaman beranda publik dan detail artikel terkait bagi pengunjung umum.

### Langkah-langkah Menjalankan Aplikasi Secara Lokal
1. Clone repositori ini atau unduh file ZIP-nya.
2. Buka folder proyek di terminal, lalu jalankan `composer install`.
3. Duplikat file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda (`DB_DATABASE=db_blog`).
4. Jalankan perintah `php artisan key:generate`.
5. Jalankan migrasi database dengan `php artisan migrate`.
6. Hidupkan server lokal dengan perintah `php artisan serve`.