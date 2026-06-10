<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // 1. Fungsi Utama Menampilkan Halaman Depan Blog Publik
    public function index(Request $request)
    {
        // Ambil semua kategori untuk menu sebelah kanan
        $categories = KategoriArtikel::all();

        // Cek apakah pengunjung sedang melakukan filter kategori
        $selectedCategory = $request->query('kategori');

        if ($selectedCategory) {
            // Ambil maksimal 5 artikel sesuai kategori yang dipilih
            $articles = Artikel::with(['kategoriArtikel', 'penulis'])
                ->where('id_kategori', $selectedCategory)
                ->orderBy('id', 'desc')
                ->take(5)
                ->get();
        } else {
            // Ambil 5 artikel terbaru secara umum
            $articles = Artikel::with(['kategoriArtikel', 'penulis'])
                ->orderBy('id', 'desc')
                ->take(5)
                ->get();
        }

        return view('pengunjung.index', compact('articles', 'categories', 'selectedCategory'));
    }

    // 2. Fungsi Menampilkan Isi Detail Artikel dan Artikel Terkait
    public function show($id)
    {
        // Cari artikel berdasarkan ID
        $article = Artikel::with(['kategoriArtikel', 'penulis'])->findOrFail($id);

        // Cari 5 artikel terkait dalam kategori yang sama (kecuali artikel yang sedang dibaca)
        $relatedArticles = Artikel::where('id_kategori', $article->id_kategori)
            ->where('id', '!=', $article->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('pengunjung.show', compact('article', 'relatedArticles'));
    }
}