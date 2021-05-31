<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('idSiswa');
            $table->unsignedBigInteger('idUsers');
            $table->foreign('idUsers')->references('idUsers')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nis', 30)->nullable();
            $table->string('nama_siswa', 50);
            $table->string('alamat', 50);
            $table->enum('jk', ['L', 'P']);
            $table->string('tmp_lahir', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('telp', 15)->nullable();
            $table->string('nama_ortu', 50);
            $table->enum('status_2', ['Pendaftar', 'Siswa', 'Alumni']);
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

