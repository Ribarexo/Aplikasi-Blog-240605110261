<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    // 1. Menampilkan daftar semua penulis
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    // 2. Menampilkan formulir tambah penulis
    public function create()
    {
        return view('penulis.create');
    }

    // 3. Memproses penyimpanan data penulis baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_depan'    => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'user_name'     => 'required|string|max:50',
        ]);

        Penulis::create([
            'nama_depan'    => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name'     => $request->user_name,
            'password'      => bcrypt('password123'), 
            'foto'          => 'default.jpg',         
        ]);

        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil ditambahkan!');
    }

    // 4. Menampilkan formulir edit penulis
    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    // 5. Memproses pembaruan data penulis
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_depan'    => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'user_name'     => 'required|string|max:50',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->update([
            'nama_depan'    => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name'     => $request->user_name,
        ]);

        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil diperbarui!');
    }

    // 6. Memproses penghapusan data penulis
    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();

        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil dihapus!');
    }
}