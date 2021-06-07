<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
    /**
     * Run
     * @retuthe migrations.
     *rn void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('idNilai');
            $table->bigInteger('idMapel')->unsigned();
            $table->bigInteger('idPegawai')->unsigned();
            $table->foreign('idPegawai')->references('idPegawai')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idMapel')->references('idMapel')->on('mapel')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idSiswa')->unsigned();
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kkm', 5);
            $table->string('nilai_akademik', 5);
            $table->string('deskripsi_akademik', 100);
            $table->string('nilai_kreatifitas', 5);
            $table->string('deskripsi_kreatifitas', 100);
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
        Schema::dropIfExists('nilai');
    }
}
