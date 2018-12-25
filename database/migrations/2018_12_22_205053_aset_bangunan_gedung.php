<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsetBangunanGedung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_bangunan_gedung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_registrasi_aset')->index();
            $table->integer('jumlah_lantai');
            $table->multipolygon('geom', "GEOMETRY", 0)->nullable();
            
            $table->foreign('no_registrasi_aset')->references('no_registrasi_aset')->on('data_master');
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
        Schema::dropIfExists('aset_bangunan_gedung');
    }
}
