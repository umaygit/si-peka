<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetak()
    {
        $pendaftar = Pendaftar::all();
        return view('cetak.index', compact('pendaftar'));
    }


    public function print(Request $request)
    {
        $nama = $request->input('nama');
        $pendaftar = Pendaftar::where('nama', $nama)->get();
        return view('cetak.print', compact('pendaftar'));
    }



}
