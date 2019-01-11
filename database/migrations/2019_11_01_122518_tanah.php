<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tanah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tanah', function (Blueprint $table) {
             $table->increments('id');
             $table->string('no_registrasi_aset');
             $table->integer('kd_brg')->unsigned();
             $table->string('status_dokumen');
             $table->string('jenis_dokumen');
             $table->string('jenis_sertifikat');
             $table->string('no_dokumen');
             $table->date('tanggal_dokumen');
             $table->string('foto_dokumen')->nullable();
             $table->integer('kuantitas');
             $table->integer('luass');
             $table->integer('luasb');
             $table->integer('luasl');
             $table->integer('luask');
             $table->integer('kd_prov');
             $table->integer('kd_kab');
             $table->integer('kd_kec');
             $table->integer('kd_kel');
             $table->string('batas_u');
             $table->string('batas_s');
             $table->string('batas_t');
             $table->string('batas_b');
             $table->integer('kd_trn')->unsigned();
             $table->string('sumber');
             $table->string('dari');
             $table->string('surat1');
             $table->string('surat2');
             $table->string('surat3');

             $table->string('unit_pmk');
             $table->string('alm_pmk');
             $table->string('catatan');
             $table->date('tgl_prl');
             $table->date('tgl_buku');

             $table->integer('id_kepemilikan')->unsigned();
             $table->integer('id_status')->unsigned();

             $table->integer('rph_aset');
             $table->multipolygon('geom', "GEOMETRY", 0)->nullable();

//             $table->foreign('no_registrasi_aset')->references('no_registrasi_aset')->on('asset')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('kd_brg')->references('kd_brg')->on('sskel');
             $table->foreign('kd_trn')->references('kd_trn')->on('transaksi');
             $table->foreign('id_kepemilikan')->references('id_kepemilikan')->on('kepemilikan');
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
         Schema::dropIfExists('tanah');
     }
}
