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
             $table->integer('luass')->nullable();
             $table->integer('luasb')->nullable();
             $table->integer('luasl')->nullable();
             $table->integer('luask')->nullable();
             $table->integer('kd_prov')->nullable();
             $table->integer('kd_kab')->nullable();
             $table->integer('kd_kec')->nullable();
             $table->integer('kd_kel')->nullable();
             $table->string('batas_u')->nullable();
             $table->string('batas_s')->nullable();
             $table->string('batas_t')->nullable();
             $table->string('batas_b')->nullable();
             $table->string('sumber')->nullable();
             $table->string('dari')->nullable();
             $table->string('surat1')->nullable();
             $table->string('surat2')->nullable();
             $table->string('surat3')->nullable();
             $table->date('tgl_prl')->nullable();
             $table->string('id_kepemilikan')->index()->nullable();
             $table->multipolygon('geom', "GEOMETRY", 0)->nullable();
//             $table->string('kd_trn')->index()->nullable();
//             $table->string('status_dokumen')->nullable();
//             $table->string('jenis_dokumen')->nullable();
//             $table->string('jenis_sertifikat')->nullable();
//             $table->string('no_dokumen')->nullable();
//             $table->date('tanggal_dokumen')->nullable();
//             $table->string('foto_dokumen')->nullable()->nullable();
//             $table->integer('kuantitas')->nullable();
//             $table->string('unit_pmk')->nullable();
//             $table->string('alm_pmk')->nullable();
//             $table->string('catatan')->nullable();
//             $table->date('tgl_buku')->nullable();
//             $table->string('id_status')->index()->nullable();
//             $table->integer('rph_aset')->nullable();

             $table->foreign('id_kepemilikan')->references('id_kepemilikan')->on('kepemilikan');
             $table->foreign('id')->references('id')->on('asset')->onDelete('cascade')->onUpdate('cascade');

//             $table->foreign('kd_brg')->references('kd_brg')->on('sskel');
//             $table->foreign('kd_trn')->references('kd_trn')->on('transaksi');



//             $table->foreign('id_status')->references('id_status')->on('status')->onDelete('cascade')->onUpdate('cascade');
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
