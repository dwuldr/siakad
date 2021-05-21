<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('idGuru');
            $table->unsignedBigInteger('idUsers');
            $table->foreign('idUsers')->references('idUsers')->on('Users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip', 255)->nullable();
            $table->string('nama_guru', 50);
            $table->enum('jk', ['L', 'P']);
            $table->string('tmp_lahir', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
			$table->string('alamat', 50);
            $table->string('telp', 15)->nullable();
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
        Schema::dropIfExists('guru');
    }
}
