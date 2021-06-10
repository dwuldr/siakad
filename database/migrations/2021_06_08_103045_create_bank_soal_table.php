<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_soal', function (Blueprint $table) {
            $table->bigIncrements('idBankSoal');
            $table->unsignedBigInteger('idUjian');
            $table->foreign('idUjian')->references('idUjian')->on('ujian')->onUpdate('cascade')->onDelete('cascade');
            $table->text('soal');
            $table->string('jawaban1', 255);
            $table->string('jawaban2', 255);
            $table->string('jawaban3', 255);
            $table->string('jawaban4', 255);
            $table->enum('kunci', ['a', 'b', 'c', 'd']);
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
        Schema::dropIfExists('bank_soal');
    }
}
