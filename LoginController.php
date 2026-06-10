<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller 
{ 
    // Menampilkan halaman form login
    public function index() 
    { 
        return view('login.index'); 
    } 

    // Memproses data login yang dikirim dari form
    public function proses(Request $request) 
    { 
        $kredensial = [ 
            'user_name' => $request->user_name, 
            'password' => $request->password, 
        ]; 

        // Proses pencocokan username dan password ke tabel penulis
        if (Auth::attempt($kredensial)) { 
            $request->session()->regenerate(); // Mencegah session fixation attack

            // Simpan waktu login saat ini ke session dengan format Indonesia
            $request->session()->put( 
                'waktu_login', 
                now() 
                ->timezone('Asia/Jakarta') 
                ->locale('id') 
                ->isoFormat('dddd, D MMMM Y | HH:mm') 
            ); 

            return redirect()->route('dashboard'); 
        } 

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([ 
            'gagal' => 'Username atau password salah.', 
        ]); 
    } 

    // Memproses logout
    public function logout(Request $request) 
    { 
        Auth::logout(); 

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect()->route('login'); 
    } 
}