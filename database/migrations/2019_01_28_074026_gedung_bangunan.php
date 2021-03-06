<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GedungBangunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gedung_bangunan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('luas_bdg')->nullable();
            $table->integer('jumlah_lt')->nullable();
            $table->string('tipe')->nullable();
            $table->string('tahun_selesai')->nullable();
            $table->string('tahun_pakai')->nullable();
            $table->integer('kd_prov')->nullable();
            $table->integer('kd_kab')->nullable();
            $table->string('kd_kec')->nullable();
            $table->string('kd_kel')->nullable();
            $table->string('alamat')->nullable();
            $table->string('dari')->nullable();
            $table->date('tgl_prl')->nullable();
            $table->foreign('id')->references('id')->on('asset')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('gedung_bangunan');
    }
}
