<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaHasKartuKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('warga_has_kartu_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_warga');
            $table->unsignedBigInteger('id_keluarga');
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('wargas')->onDelete('cascade');
            $table->foreign('id_keluarga')->references('id_keluarga')->on('kartu_keluargas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('warga_has_kartu_keluarga');
    }
}
