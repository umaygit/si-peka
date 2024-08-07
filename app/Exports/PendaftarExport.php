<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftar::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Mahasiswa',
            'Alamat',
            'Jenis Kelamin',
            'Asal Sekolah',
            'Prodi',
            'No HP/WA',
        ];
    }
}
