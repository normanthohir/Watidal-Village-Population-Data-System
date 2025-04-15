<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id('id_mutasi'); // ID unik mutasi
            $table->string('nik_mutasi', 16)->unique(); // NIK mutasi
            $table->string('nama_mutasi'); // Nama lengkap mutasi
            $table->string('tempat_lahir_mutasi'); // Tempat lahir
            $table->date('tanggal_lahir_mutasi'); // Tanggal lahir
            $table->enum('jenis_kelamin_mutasi', ['L', 'P']); // Jenis kelamin
            $table->text('alamat_ktp_mutasi'); // Alamat sesuai KTP
            $table->text('alamat_mutasi'); // Alamat tempat tinggal saat ini
            $table->string('desa_kelurahan_mutasi'); // Desa atau Kelurahan
            $table->string('kecamatan_mutasi'); // Kecamatan
            $table->string('kabupaten_kota_mutasi'); // Kabupaten atau Kota
            $table->string('provinsi_mutasi'); // Provinsi
            $table->string('rt_mutasi'); // RT
            $table->string('rw_mutasi'); // RW
            $table->string('agama_mutasi'); // Agama
            $table->string('pendidikan_terakhir_mutasi'); // Pendidikan terakhir
            $table->string('pekerjaan_mutasi'); // Pekerjaan
            $table->enum('status_perkawinan_mutasi', ['Belum Kawin', 'Kawin']); // Status perkawinan
            $table->string('status_mutasi'); // Status kependudukan
            $table->unsignedBigInteger('id_user'); // ID pengguna yang memasukkan data
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
        Schema::dropIfExists('mutasis');
    }
}
