<?php

namespace Database\Factories;

use App\Models\Mutasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MutasiFactory extends Factory
{
    protected $model = Mutasi::class;

    public function definition()
    {
        return [
            'nik_mutasi' => $this->faker->unique()->numerify('################'),
            'nama_mutasi' => $this->faker->name,
            'tempat_lahir_mutasi' => $this->faker->city,
            'tanggal_lahir_mutasi' => $this->faker->date,
            'jenis_kelamin_mutasi' => $this->faker->randomElement(['L', 'P']),
            'alamat_ktp_mutasi' => $this->faker->address,
            'alamat_mutasi' => $this->faker->address,
            'desa_kelurahan_mutasi' => $this->faker->city,
            'kecamatan_mutasi' => $this->faker->city,
            'kabupaten_kota_mutasi' => $this->faker->city,
            'provinsi_mutasi' => $this->faker->state,
            'rt_mutasi' => $this->faker->randomDigitNotNull,
            'rw_mutasi' => $this->faker->randomDigitNotNull,
            'agama_mutasi' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'pendidikan_terakhir_mutasi' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']),
            'pekerjaan_mutasi' => $this->faker->jobTitle,
            'status_perkawinan_mutasi' => $this->faker->randomElement(['Belum Kawin', 'Kawin']),
            'status_mutasi' => $this->faker->randomElement(['Tetap', 'Sementara']),
            'id_user' => User::first()->id,
        ];
    }
}
