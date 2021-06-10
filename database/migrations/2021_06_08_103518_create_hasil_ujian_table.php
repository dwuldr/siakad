<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_ujian', function (Blueprint $table) {
            $table->bigIncrements('idHasilUjian');
            $table->unsignedBigInteger('idUjian');
            $table->foreign('idUjian')->references('idUjian')->on('ujian')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idSiswa');
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('listsoal', 255);
            $table->string('jawaban', 255);
            $table->string('skor', 10);
            $table->datetime('tgl_mulai');
            $table->datetime('tgl_selesai');
            $table->enum('status', ['Y', 'N']);
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
        Schema::dropIfExists('hasil_ujian');
    }
}
