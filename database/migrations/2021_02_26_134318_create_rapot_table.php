<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapot', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('siswa');
            $table->string('kelas');
            $table->string('akademik');
            $table->string('integritas');
            $table->string('religius');
            $table->string('nasionalis');
            $table->string('mandiri');
            $table->string('gotong_royong');
            $table->string('catatan');
            $table->string('mitra_pkl')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('lama_pkl')->nullable();
            $table->string('keterangan')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rapot');
    }
}
