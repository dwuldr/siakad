<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('idJadwal');
            $table->bigInteger('idSemester')->unsigned();
            $table->foreign('idSemester')->references('idSemester')->on('semester')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idPegawai')->unsigned();
            $table->foreign('idPegawai')->references('idPegawai')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idMapel')->unsigned();
            $table->foreign('idMapel')->references('idMapel')->on('mapel')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idKelas')->unsigned();
            $table->foreign('idKelas')->references('idKelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
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
        Schema::dropIfExists('jadwal');
    }
}
