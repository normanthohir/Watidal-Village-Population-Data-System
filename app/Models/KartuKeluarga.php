<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluargas';

    protected $primaryKey = 'id_keluarga';

    protected $fillable = [
        'nomor_keluarga',
        'id_kepala_keluarga',
        'alamat_keluarga',
        'desa_kelurahan_keluarga',
        'kecamatan_keluarga',
        'kabupaten_kota_keluarga',
        'provinsi_keluarga',
        'rt_keluarga',
        'rw_keluarga',
        'kode_pos_keluarga',
        'id_user',
    ];

    // Definisikan relasi dengan model Warga dan User

    public function kepalaKeluarga()
    {
        return $this->belongsTo(Warga::class, 'id_kepala_keluarga');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function anggota()
    {
        return $this->belongsToMany(Warga::class, 'warga_has_kartu_keluarga', 'id_keluarga', 'id_warga');
    }
    
}
