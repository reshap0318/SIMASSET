<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsetTanah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_tanah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_registrasi_aset')->index();
            $table->string('status_dokumen');
            $table->string('jenis_dokumen');
            $table->string('jenis_sertifikat');
            $table->string('no_dokumen');
            $table->date('tanggal_dokumen');
            $table->integer('luas');
            $table->integer('luas_tanah_bangunan');
            $table->multipolygon('geom', "GEOMETRY", 0)->nullable();
             $table->timestamps();



            $table->foreign('no_registrasi_aset')->references('no_registrasi_aset')->on('data_master');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset_tanah');
    }
}
