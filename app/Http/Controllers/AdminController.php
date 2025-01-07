<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login-admin');
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input username dan password
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Dummy credentials (ganti dengan autentikasi yang sesuai)
        $credentials = [
            'admin' => 'admin123',
        ];

        $username = $request->input('username');
        $password = $request->input('password');

        // Periksa apakah username dan password cocok
        if (isset($credentials[$username]) && $credentials[$username] === $password) {
            // Simpan sesi login
            Session::put('admin_logged_in', true);
            Session::put('admin_username', $username);

            // Redirect ke dashboard setelah login sukses
            return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil!');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->with('error', 'Nama pengguna atau kata sandi salah.');
    }

    // Menampilkan dashboard admin
    public function dashboard()
    {
        // Cek apakah admin sudah login
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Harap login terlebih dahulu.');
        }

        return view('dashboard');
    }

    // Menampilkan galeri admin
    public function galeryAdmin()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Harap login terlebih dahulu.');
        }

        return view('galery-admin');
    }

    // Menampilkan artikel admin
    public function artikelAdmin()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Harap login terlebih dahulu.');
        }

        return view('artikel-admin');
    }

    // Menampilkan aksara admin
    public function aksaraAdmin()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Harap login terlebih dahulu.');
        }

        return view('aksara-admin');
    }

    // Menampilkan kalender admin
    public function kalenderAdmin()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Harap login terlebih dahulu.');
        }

        return view('kalender-admin');
    }

    // Menampilkan about admin
    public function aboutAdmin()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Harap login terlebih dahulu.');
        }

        return view('about-admin');
    }

    // Logout admin
    public function logout()
    {
        // Hapus semua session admin
        Session::flush();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    }
}

