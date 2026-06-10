<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    public $timestamps = false;

    // Pastikan 'gambar' sudah dimasukkan ke dalam daftar di bawah ini
    protected $fillable = [
        'judul',
        'isi',
        'id_kategori',
        'id_penulis',
        'gambar', 
    ];

    public function kategoriArtikel()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }
}