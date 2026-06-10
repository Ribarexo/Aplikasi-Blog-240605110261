<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    // 1. MENAMPILKAN SEMUA DATA KATEGORI
    public function index()
    {
        $kategori = KategoriArtikel::all();
        return view('kategori.index', compact('kategori'));
    }

    // 2. MENAMPILKAN FORM TAMBAH KATEGORI
    public function create()
    {
        return view('kategori.create');
    }

    // 3. MENYIMPAN DATA KATEGORI BARU KE DATABASE
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:50',
            'keterangan'    => 'nullable',
        ]);

        KategoriArtikel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil ditambahkan!');
    }

    // Tampilkan detail (kosongkan / tidak wajib diisi untuk modul ini)
    public function show($id)
    {
        //
    }

    // 4. MENAMPILKAN FORM EDIT KATEGORI
    public function edit($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // 5. MEMPERBARUI DATA KATEGORI DI DATABASE
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:50',
            'keterangan'    => 'nullable',
        ]);

        $kategori = KategoriArtikel::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil diperbarui!');
    }

    // 6. MENGHAPUS DATA KATEGORI
    public function destroy($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil dihapus!');
    }
}