<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemindahtangananAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemindahtangan_aset', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aset_id')->unsigned();
            $table->date('tanggal');
            $table->string('kepada');
            $table->string('kepada');
            $table->string('keterangan');
            $table->string('dokumen_path')->nullable();
            $table->foreign('aset_id')->references('id')->on('asset');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
