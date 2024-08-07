<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Nama pengguna harus diisi.',
            'password.required' => 'Kata sandi harus diisi.',
        ]);

        // Mendapatkan kredensial
        $credentials = $request->only('username', 'password');

        // Mencoba autentikasi
        if (Auth::attempt($credentials)) {
            // Cek apakah pengguna adalah admin
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'loginError' => 'Anda tidak memiliki akses ke halaman ini.',
                ]);
            }
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'loginError' => 'Username atau Password salah.',
        ]);
    }

    public function showDashboard()
    {
        return view('dashboard.index'); // Pastikan ini adalah view untuk admin dashboard
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register');
    }

    public function registerAdmin(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'username.required' => 'Nama pengguna harus diisi.',
            'username.unique' => 'Nama pengguna sudah digunakan.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        // Membuat pengguna baru dengan peran admin
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username, // Pastikan username disediakan
            'password' => Hash::make($request->password),
            'role' => 'admin', // Menetapkan peran admin
        ]);

        // Login pengguna yang baru terdaftar
        Auth::login($user);

        // Redirect ke dashboard admin
        return redirect()->intended('admin/dashboard');
    }
}


