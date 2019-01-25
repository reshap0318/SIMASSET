<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('asset', function (Blueprint $table) {
        $table->increments('id');
        $table->string('no_registrasi_aset')->index();
        $table->string('kd_brg');
          $table->integer('kuantitas')->nullable();
          $table->string('catatan')->nullable();
          $table->string('nama')->nullable();

          $table->text('foto');
          $table->integer('master_id')->unsigned();
          $table->integer('rph_aset')->nullable();
          $table->string('unit_pmk')->nullable();
          $table->string('alm_pmk')->nullable();
          $table->date('tgl_buku')->nullable();
          $table->string('id_status')->index()->nullable();
          $table->string('kd_trn')->index()->nullable();
//        $table->string('kode_satker');
//        $table->string('nup');
//        $table->string('no_kib');
//        $table->integer('kondisi');
//        $table->string('merek');
//        $table->string('tercatat_dalam');
//        $table->string('status_sbsn');
//        $table->string('status_aset_idle');


        $table->foreign('master_id')->references('id')->on('data_master');
        $table->foreign('kd_brg')->references('kd_brg')->on('sskel');
        $table->foreign('kd_trn')->references('kd_trn')->on('transaksi');
        $table->foreign('id_status')->references('id_status')->on('status')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('asset');
    }
}
