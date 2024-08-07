<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'prodi' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Buat data pendaftar baru
        Pendaftar::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'prodi' => $request->prodi,
            'sekolah' => $request->sekolah,
            'no_hp' => $request->no_hp,
        ]);

        // Redirect ke halaman pendaftaran dengan pesan sukses
        return redirect()->route('register.succes')->with('success', 'Pendaftaran berhasil dilakukan...');
    }


}
