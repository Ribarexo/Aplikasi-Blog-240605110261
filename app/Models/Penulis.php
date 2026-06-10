<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';

    public $timestamps = false;

    // Sesuaikan dengan kolom yang ada di phpMyAdmin Anda
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'user_name',
        'password',
        'foto',
    ];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_penulis');
    }
}