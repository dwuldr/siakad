<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmisiUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submisi_upload', function (Blueprint $table) {
            $table->bigIncrements('idSubmisiUpload');
            $table->unsignedBigInteger('idSubmisi');
            $table->foreign('idSubmisi')->references('idSubmisi')->on('submisi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('url');
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
        Schema::dropIfExists('submisi_upload');
    }
}
