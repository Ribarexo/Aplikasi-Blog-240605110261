<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
 
class DashboardController extends Controller 
{ 
    // Menampilkan halaman dashboard utama penulis setelah berhasil login
    public function index() 
    { 
        $pengguna = Auth::user(); 
 
        // Menyiapkan data penulis yang akan dikirim ke view dashboard
        $data = [ 
            'nama_lengkap' => $pengguna->nama_depan . ' ' . $pengguna->nama_belakang, 
            'foto' => $pengguna->foto ?? 'default.png', 
            'waktu_login' => session('waktu_login', '-'), 
        ]; 
 
        return view('dashboard.index', $data); 
    } 
}