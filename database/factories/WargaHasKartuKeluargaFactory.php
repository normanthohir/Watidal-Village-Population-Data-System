<?php

namespace Database\Factories;

use App\Models\WargaHasKartuKeluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

class WargaHasKartuKeluargaFactory extends Factory
{
    protected $model = WargaHasKartuKeluarga::class;

    public function definition()
    {
        return [
            'id_warga' => \App\Models\Warga::factory(),
            'id_keluarga' => \App\Models\KartuKeluarga::factory(),
        ];
    }
}
