<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submisi', function (Blueprint $table) {
            $table->bigIncrements('idSubmisi');
            $table->unsignedBigInteger('idTugas');
            $table->foreign('idTugas')->references('idTugas')->on('tugas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idSiswa');
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->float('nilai');
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
        Schema::dropIfExists('submisi');
    }
}
