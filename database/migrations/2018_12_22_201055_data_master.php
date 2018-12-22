<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataMaster extends Migration
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
            $table->string('kode_barang');
            $table->string('kode_satker');
            $table->string('nup');
            $table->string('no_kib');
            $table->integer('kondisi');
            $table->string('merek');
            $table->string('tercatat_dalam');
            $table->string('status_sbsn');
            $table->string('status_aset_idle');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
            $table->foreign('kode_satker')->references('kode_satker')->on('satker');
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
        Schema::dropIfExists('data_master');
    }
}
