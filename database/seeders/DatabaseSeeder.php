<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warga;
use App\Models\KartuKeluarga;
use App\Models\Mutasi;
use App\Models\WargaHasKartuKeluarga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed untuk User
        User::factory()->create([
            'name' => 'Norman Thohir',
            'email' => 'norman@gmail.com',
            'password' => Hash::make('norman2005'), // Ganti 'password' dengan password yang diinginkan
            'username' => 'normanthohir',
            'keterangan_user' => 'Administrator',
            'status_user' => 'admin',
            'desa_kelurahan_user' => 'Desa Watidal',
            'kecamatan_user' => 'Tanimbar Utara',
            'kabupaten_kota_user' => 'Kepulauan Tanimbar',
            'provinsi_user' => 'Maluku',
            'rt_user' => '001',
            'rw_user' => '001',
        ]);

        // Seed untuk Warga
        Warga::factory()->count(200)->create();

        // Seed untuk KartuKeluarga
        KartuKeluarga::factory()->count(97)->create();

        // Seed untuk Mutasi
        Mutasi::factory()->count(30)->create();

        // Seed untuk anggota keluarga
        $this->seedWargaHasKartuKeluarga();
    }

    private function seedWargaHasKartuKeluarga()
    {
        $wargas = Warga::all();
        $kartuKeluargas = KartuKeluarga::all();

        // Loop through each kartu keluarga and assign members
        $assignedWargas = [];

        foreach ($kartuKeluargas as $kartuKeluarga) {
            // Pilih beberapa warga secara acak untuk menjadi anggota keluarga
            $anggotaKeluarga = $wargas->random(rand(3, 6));

            foreach ($anggotaKeluarga as $warga) {
                if (!in_array($warga->id_warga, $assignedWargas)) {
                    // Create a record in the pivot table
                    WargaHasKartuKeluarga::create([
                        'id_warga' => $warga->id_warga,
                        'id_keluarga' => $kartuKeluarga->id_keluarga,
                    ]);
                    $assignedWargas[] = $warga->id_warga;
                }
            }
        }
    }
}
