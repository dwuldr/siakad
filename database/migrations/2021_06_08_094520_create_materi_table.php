<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->bigIncrements('idMateri');
            $table->unsignedBigInteger('idJadwal');
            $table->foreign('idJadwal')->references('idJadwal')->on('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul', 255);
            $table->string('file', 255);
            $table->text('deskripsi');
            $table->date('tanggal');
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
        Schema::dropIfExists('materi');
    }
}

