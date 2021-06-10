<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->bigIncrements('idUjian');
            $table->unsignedBigInteger('idJadwal');
            $table->foreign('idJadwal')->references('idJadwal')->on('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('kategori', ['Ulangan Harian', 'Ulangan Tengah Semester', 'Ulangan Akhir Semester'])->nullable();
            $table->string('nama_ujian', 100);
            $table->datetime('waktu_awal');
            $table->datetime('waktu_akhir');
            $table->integer('durasi');
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
        Schema::dropIfExists('ujian');
    }
}
