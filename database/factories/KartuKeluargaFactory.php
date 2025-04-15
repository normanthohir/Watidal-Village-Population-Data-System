<?php

namespace Database\Factories;

use App\Models\KartuKeluarga;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

class KartuKeluargaFactory extends Factory
{
    protected $model = KartuKeluarga::class;

    public function definition()
    {
        return [
            'nomor_keluarga' => $this->faker->unique()->numerify('############'),
            'id_kepala_keluarga' => Warga::factory(),
            'alamat_keluarga' => $this->faker->address,
            'desa_kelurahan_keluarga' => $this->faker->city,
            'kecamatan_keluarga' => $this->faker->city,
            'kabupaten_kota_keluarga' => $this->faker->city,
            'provinsi_keluarga' => $this->faker->state,
            'rt_keluarga' => $this->faker->randomDigitNotNull,
            'rw_keluarga' => $this->faker->randomDigitNotNull,
            'kode_pos_keluarga' => $this->faker->postcode,
            'id_user' => User::first()->id,
        ];
    }
}
