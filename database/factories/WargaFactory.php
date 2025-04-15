<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

class WargaFactory extends Factory
{
    protected $model = Warga::class;

    public function definition()
    {
        return [
            'nik_warga' => $this->faker->unique()->numerify('################'),
            'nama_warga' => $this->faker->name,
            'tempat_lahir_warga' => $this->faker->city,
            'tanggal_lahir_warga' => $this->faker->date,
            'jenis_kelamin_warga' => $this->faker->randomElement(['L', 'P']),
            'alamat_ktp_warga' => $this->faker->address,
            'alamat_warga' => $this->faker->address,
            'desa_kelurahan_warga' => $this->faker->city,
            'kecamatan_warga' => $this->faker->city,
            'kabupaten_kota_warga' => $this->faker->city,
            'provinsi_warga' => $this->faker->state,
            'rt_warga' => $this->faker->randomDigitNotNull,
            'rw_warga' => $this->faker->randomDigitNotNull,
            'agama_warga' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'pendidikan_terakhir_warga' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']),
            'pekerjaan_warga' => $this->faker->jobTitle,
            'status_perkawinan_warga' => $this->faker->randomElement(['Belum Kawin', 'Kawin']),
            'status_warga' => $this->faker->randomElement(['Tetap', 'Sementara']),
            'id_user' => User::first()->id,
        ];
    }
}
