<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id('id_keluarga'); // ID unik keluarga
            $table->string('nomor_keluarga')->unique(); // Nomor kartu keluarga
            $table->unsignedBigInteger('id_kepala_keluarga'); // ID kepala keluarga
            $table->text('alamat_keluarga'); // Alamat keluarga
            $table->string('desa_kelurahan_keluarga'); // Desa atau Kelurahan
            $table->string('kecamatan_keluarga'); // Kecamatan
            $table->string('kabupaten_kota_keluarga'); // Kabupaten atau Kota
            $table->string('provinsi_keluarga'); // Provinsi
            $table->string('rt_keluarga'); // RT
            $table->string('rw_keluarga'); // RW
            $table->string('kode_pos_keluarga'); // Kode pos
            $table->unsignedBigInteger('id_user'); // ID pengguna yang memasukkan data
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraints
            $table->foreign('id_kepala_keluarga')->references('id_warga')->on('wargas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartu_keluargas');
    }
}
