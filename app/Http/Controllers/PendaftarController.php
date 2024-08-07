<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftarExport;

class PendaftarController extends Controller
{
    // public function index()
    // {
    //     $pendaftars = Pendaftar::all();
    //     return view('pendaftar.index', compact('pendaftars'));
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $pendaftars = \App\Models\Pendaftar::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                        ->orWhere('prodi', 'like', "%{$search}%");
        })->get();

        return view('pendaftar.index', compact('pendaftars'));
    }

    // Menghapus pendaftar berdasarkan ID
    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'prodi' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'prodi' => $request->prodi,
            'sekolah' => $request->sekolah,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('pendaftar.index')->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.edit', compact('pendaftar'));
    }

    public function exportExcel()
    {
        return Excel::download(new PendaftarExport, 'pendaftar_peka.xlsx');
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.show', compact('pendaftar'));
    }

    public function cetak($id)
    {
        $pendaftar = Pendaftar::find($id);
        return view('pendaftar.cetak', compact('pendaftar'));
    }

}
