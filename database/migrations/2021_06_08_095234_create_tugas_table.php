<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('idTugas');
            $table->unsignedBigInteger('idJadwal');
            $table->foreign('idJadwal')->references('idJadwal')->on('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul', 255);
            $table->string('file', 255);
            $table->text('deskripsi');
            $table->datetime('waktu_awal');
            $table->datetime('waktu_akhir');
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
        Schema::dropIfExists('tugas');
    }
}
