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
        Schema::create('data_master', function (Blueprint $table) {
            $table->string('no_registrasi_aset')->index();
            $table->integer('jumlah_lantai');
            $table->geometry('geom');
            $table->foreign('no_registrasi_aset')->references('no_registrasi_aset')->on('data_master');
            $table->timestamp('created_at')->nullable();
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
