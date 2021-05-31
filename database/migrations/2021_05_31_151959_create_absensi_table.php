<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('idAbsensi');
            $table->bigInteger('idJadwal')->unsigned();
            $table->foreign('idJadwal')->references('idJadwal')->on('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl');
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
        Schema::dropIfExists('absensi');
    }
}

