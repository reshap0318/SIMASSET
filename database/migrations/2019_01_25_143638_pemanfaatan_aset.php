<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemanfaatanAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemanfaatan_aset', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aset_id')->unsigned();
            $table->date('tanggal');
            $table->string('penyewa');
            $table->string('perihal');
            $table->integer('lama_sewa');
            $table->integer('biaya');
            $table->string('dokumen_path')->nullable();
            $table->foreign('aset_id')->references('id')->on('asset');
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
        Schema::dropIfExists('pemanfaatan_aset');
    }
}
