<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasis';

    protected $primaryKey = 'id_mutasi';

    protected $fillable = [
        'nik_mutasi',
        'nama_mutasi',
        'tempat_lahir_mutasi',
        'tanggal_lahir_mutasi',
        'jenis_kelamin_mutasi',
        'alamat_ktp_mutasi',
        'alamat_mutasi',
        'desa_kelurahan_mutasi',
        'kecamatan_mutasi',
        'kabupaten_kota_mutasi',
        'provinsi_mutasi',
        'rt_mutasi',
        'rw_mutasi',
        'agama_mutasi',
        'pendidikan_terakhir_mutasi',
        'pekerjaan_mutasi',
        'status_perkawinan_mutasi',
        'status_mutasi',
        'id_user',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function getTanggalLahirMutasiAttribute($value)
    {
        return Carbon::parse($value); // pastikan $value adalah dalam format yang bisa di-parse oleh Carbon
    }

    public function umurSekarang()
    {
        return $this->tanggal_lahir_mutasi->diffInYears(now());
    }
}
