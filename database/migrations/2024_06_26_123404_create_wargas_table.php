<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id('id_warga'); // ID unik warga
            $table->string('nik_warga', 16)->unique(); // NIK warga
            $table->string('nama_warga'); // Nama lengkap warga
            $table->string('tempat_lahir_warga'); // Tempat lahir
            $table->date('tanggal_lahir_warga'); // Tanggal lahir
            $table->enum('jenis_kelamin_warga', ['L', 'P']); // Jenis kelamin
            $table->text('alamat_ktp_warga'); // Alamat sesuai KTP
            $table->text('alamat_warga'); // Alamat tempat tinggal saat ini
            $table->string('desa_kelurahan_warga'); // Desa atau Kelurahan
            $table->string('kecamatan_warga'); // Kecamatan
            $table->string('kabupaten_kota_warga'); // Kabupaten atau Kota
            $table->string('provinsi_warga'); // Provinsi
            $table->string('rt_warga'); // RT
            $table->string('rw_warga'); // RW
            $table->string('agama_warga'); // Agama
            $table->string('pendidikan_terakhir_warga'); // Pendidikan terakhir
            $table->string('pekerjaan_warga'); // Pekerjaan
            $table->enum('status_perkawinan_warga', ['Belum Kawin', 'Kawin']); // Status perkawinan
            $table->string('status_warga'); // Status kependudukan
            $table->unsignedBigInteger('id_user'); // ID pengguna yang memasukkan data
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
