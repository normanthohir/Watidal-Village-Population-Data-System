<?php 

namespace App\Exports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WargaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Warga::all();
    }

    public function headings(): array
    {
        return [
            'NIK', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat KTP', 'Alamat', 'Desa/Kelurahan', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'RT', 'RW', 'Agama', 'Pendidikan Terakhir', 'Pekerjaan', 'Status Perkawinan', 'Status', 'Dibuat', 'Diperbaharui'
        ];
    }
}