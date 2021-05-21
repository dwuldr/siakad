<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapot', function (Blueprint $table) {
            $table->bigIncrements('idNilai');
            $table->bigInteger('idGuru')->unsigned();
            $table->foreign('idGuru')->references('idGuru')->on('guru')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idSiswa')->unsigned();
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idMapel')->unsigned();
            $table->foreign('idMapel')->references('idMapel')->on('mapel')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idKelas')->unsigned();
            $table->foreign('idKelas')->references('idKelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('p_predikat', 5);
            $table->text('p_deskripsi');
            $table->string('p_nilai', 5);
            $table->string('k_nilai', 5);
            $table->string('k_predikat', 5);
            $table->text('k_deskripsi');
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
        Schema::dropIfExists('rapot');
    }
}
