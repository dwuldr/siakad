<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('idNilai');
            $table->bigInteger('idMapel')->unsigned();
            $table->foreign('idMapel')->references('idMapel')->on('mapel')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idGuru')->unsigned();
            $table->foreign('idGuru')->references('idGuru')->on('guru')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idSiswa')->unsigned();
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kkm', 5);
            $table->string('nilai_akademik', 5);
            $table->string('deskripsi_akademik', 5);
            $table->string('nilai_kreatifitas', 5);
            $table->string('deskripsi_kreatifitas', 5);
            $table->softDeletes();
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
        Schema::dropIfExists('nilai');
    }
}
