<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaHasKartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'warga_has_kartu_keluarga';

    protected $fillable = [
        'id_warga',
        'id_keluarga',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'id_warga');
    }

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'id_keluarga');
    }
}
