<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Model;
 
class KategoriArtikel extends Model 
{ 
    protected $table = 'kategori_artikel'; // Menghubungkan ke tabel 'kategori_artikel'
 
    public $timestamps = false; // Menonaktifkan timestamps

    protected $fillable = [ 
        'nama_kategori', 
        'keterangan', 
    ];
 
    // Relasi: Satu kategori bisa digunakan oleh banyak artikel
    public function artikel() 
    { 
        return $this->hasMany(Artikel::class, 'id_kategori');
    } 
}