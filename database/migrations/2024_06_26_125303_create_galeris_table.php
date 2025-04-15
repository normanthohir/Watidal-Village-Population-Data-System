<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id('id_galeri'); // ID unik galeri
            $table->string('path_galeri'); // Path file galeri
            $table->string('caption_galeri')->nullable(); // Caption galeri
            $table->string('tautan_galeri')->nullable(); // Tautan galeri
            $table->unsignedBigInteger('id_user'); // ID pengguna yang mengunggah galeri
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint
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
        Schema::dropIfExists('galeris');
    }
}
