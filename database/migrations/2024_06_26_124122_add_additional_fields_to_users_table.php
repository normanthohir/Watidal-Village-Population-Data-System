<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->text('keterangan_user')->nullable();
            $table->string('status_user')->nullable();
            $table->string('desa_kelurahan_user')->nullable();
            $table->string('kecamatan_user')->nullable();
            $table->string('kabupaten_kota_user')->nullable();
            $table->string('provinsi_user')->nullable();
            $table->string('rt_user')->nullable();
            $table->string('rw_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'keterangan_user',
                'status_user',
                'desa_kelurahan_user',
                'kecamatan_user',
                'kabupaten_kota_user',
                'provinsi_user',
                'rt_user',
                'rw_user',
            ]);
        });
    }
}
