<?php 

namespace App\Models; 

use Illuminate\Foundation\Auth\User as Authenticatable; 

class User extends Authenticatable 
{ 
    // Beritahu Laravel bahwa model ini menggunakan tabel kustom bernama penulis
    protected $table = 'penulis'; 

    // Matikan timestamps otomatis (created_at dan updated_at) karena tidak ada di tabel penulis
    public $timestamps = false; 

    // Kolom-kolom di database db_blog tabel penulis yang boleh diisi
    protected $fillable = [ 
        'nama_depan', 
        'nama_belakang', 
        'user_name', 
        'password', 
        'foto', 
    ]; 

    // Sembunyikan kolom password saat data dibaca
    protected $hidden = [ 
        'password', 
    ]; 
}