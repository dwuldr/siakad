<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_detail', function (Blueprint $table) {
            $table->bigIncrements('idDetail');
            $table->bigInteger('idAbsensi')->unsigned();
            $table->foreign('idAbsensi')->references('idAbsensi')->on('absensi')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idSiswa')->unsigned();
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('sakit', 5);
            $table->string('izin', 5);
            $table->string('alpha', 5);
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
        Schema::dropIfExists('absensi_detail');
    }
}



