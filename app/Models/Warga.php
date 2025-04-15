<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'wargas';

    protected $primaryKey = 'id_warga';

    protected $fillable = [
        'nik_warga',
        'nama_warga',
        'tempat_lahir_warga',
        'tanggal_lahir_warga',
        'jenis_kelamin_warga',
        'alamat_ktp_warga',
        'alamat_warga',
        'desa_kelurahan_warga',
        'kecamatan_warga',
        'kabupaten_kota_warga',
        'provinsi_warga',
        'rt_warga',
        'rw_warga',
        'agama_warga',
        'pendidikan_terakhir_warga',
        'pekerjaan_warga',
        'status_perkawinan_warga',
        'status_warga',
        'id_user',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    // App\Models\Warga.php

    public function kartuKeluargas()
    {
        return $this->belongsToMany(KartuKeluarga::class, 'warga_has_kartu_keluarga', 'id_warga', 'id_keluarga');
    }
}
