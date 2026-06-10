<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ArtikelController;
// PENTING: Panggil PengunjungController di bawah ini
use App\Http\Controllers\PengunjungController; 

/*
|--------------------------------------------------------------------------
| ROUTE HALAMAN PENGUNJUNG / PUBLIK (Bisa Diakses Tanpa Login)
|--------------------------------------------------------------------------
*/

// Sesuai Soal UAS: Jalur utama (/) sekarang langsung membuka Beranda Blog Pengunjung
Route::get('/', [PengunjungController::class, 'index'])->name('blog.index');

// Jalur untuk membaca detail konten artikel lengkap beserta artikel terkait
Route::get('/baca/{id}', [PengunjungController::class, 'show'])->name('blog.show');


/*
|--------------------------------------------------------------------------
| ROUTE AUTENTIKASI / LOGIN (Bawaan Modul 10)
|--------------------------------------------------------------------------
*/

// Route Halaman Login 
Route::get('/login', [LoginController::class, 'index']) 
    ->name('login') 
    ->middleware('guest'); 

Route::post('/login', [LoginController::class, 'proses']) 
    ->name('login.proses') 
    ->middleware('guest'); 

// Route Logout 
Route::post('/logout', [LoginController::class, 'logout']) 
    ->name('logout') 
    ->middleware('auth'); 


/*
|--------------------------------------------------------------------------
| ROUTE CMS ADMIN / MANAJEMEN KONTEN (Wajib Login / Proteksi Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Route Dashboard Utama Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    
    // Rute Otomatis CRUD untuk Kategori Artikel
    Route::resource('kategori', KategoriArtikelController::class);
    
    // Rute Otomatis CRUD untuk Data Penulis
    Route::resource('penulis', PenulisController::class);
    
    // Rute Otomatis CRUD untuk Artikel Blog
    Route::resource('artikel', ArtikelController::class);
    
});