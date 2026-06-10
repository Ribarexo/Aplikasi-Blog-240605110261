<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    // 1. Menampilkan semua artikel
    public function index()
    {
        $artikel = Artikel::with(['kategoriArtikel', 'penulis'])->get();
        return view('artikel.index', compact('artikel'));
    }

    // 2. Menampilkan form tambah artikel
    public function create()
    {
        $kategori = KategoriArtikel::all();
        $penulis = Penulis::all();
        return view('artikel.create', compact('kategori', 'penulis'));
    }

    // 3. Memproses simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'id_penulis'  => 'required',
            'id_kategori' => 'required',
            'judul'       => 'required|max:255',
            'isi'         => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Solusi Error: Berikan nilai default jika user tidak upload gambar
        $namaGambar = 'default.jpg';

        // Jika ke depannya Anda ingin menambah fitur upload gambar, kodenya seperti ini:
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaGambar);
        }

        Artikel::create([
            'id_penulis'  => $request->id_penulis,
            'id_kategori' => $request->id_kategori,
            'judul'       => $request->judul,
            'isi'         => $request->isi,
            'gambar'      => $namaGambar, // Sekarang tidak akan kosong lagi!
        ]);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diterbitkan!');
    }

    // 4. Menampilkan form edit artikel
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = KategoriArtikel::all();
        $penulis = Penulis::all();
        return view('artikel.edit', compact('artikel', 'kategori', 'penulis'));
    }

    // 5. Memproses update artikel
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_penulis'  => 'required',
            'id_kategori' => 'required',
            'judul'       => 'required|max:255',
            'isi'         => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);
        
        $artikel->update([
            'id_penulis'  => $request->id_penulis,
            'id_kategori' => $request->id_kategori,
            'judul'       => $request->judul,
            'isi'         => $request->isi,
        ]);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diperbarui!');
    }

    // 6. Menghapus artikel
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil dihapus!');
    }
}