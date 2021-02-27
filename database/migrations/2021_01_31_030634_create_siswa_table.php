<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('nis');
            $table->integer('nisn');
            $table->string('nama');
            $table->longText('alamat_1');
            $table->longText('alamat_2');
            $table->string('provinsi');
            $table->string('kabkota');
            $table->string('no_hp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status_dalam_keluarga');
            $table->string('anak_ke');
            $table->string('diterima_dikelas');
            $table->date('pada_tanggal');
            $table->string('profile')->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_ortu');
            $table->string('nohp_rumah')->nullable();
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('nama_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('nohp_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
