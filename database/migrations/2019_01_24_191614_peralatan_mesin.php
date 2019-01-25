<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeralatanMesin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peralatan_mesin', function (Blueprint $table) {
        $table->increments('id');
        $table->string('no_registrasi_aset')->nullable();
        $table->string('merek')->nullable();
        $table->string('tipe')->nullable();
        $table->string('pabrik')->nullable();
        $table->string('tahun')->nullable();
        $table->string('bahan_bakar')->nullable();
        $table->string('kapasitas')->nullable();
        $table->string('bobot')->nullable();
        $table->string('daya')->nullable();
        $table->string('no_mesin')->nullable();
        $table->string('no_rangka')->nullable();
        $table->string('no_polisi')->nullable();
        $table->string('no_bpkb')->nullable();
        $table->string('dari')->nullable();


        $table->date('tgl_prl')->nullable();
//        $table->string('catatan')->nullable();
//        $table->string('unit_pmk')->nullable();
//        $table->string('alm_pmk')->nullable();
//        $table->date('tgl_buku')->nullable();

//        $table->string('kd_trn')->nullable()->index();
//        $table->string('nama')->nullable()->index();
//        $table->string('kd_brg')->nullable()->index();
//        $table->string('foto')->nullable();
//        $table->integer('kuantitas')->nullable();

//         $table->string('id_status')->nullable()->index();
//        $table->integer('rph_aset')->nullable();
//        $table->foreign('kd_brg')->references('kd_brg')->on('sskel');
//        $table->foreign('kd_trn')->references('kd_trn')->on('transaksi');
//        $table->foreign('id_status')->references('id_status')->on('status')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('no_registrasi_aset')->references('no_registrasi_aset')->on('asset')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('peralatan_mesin');
    }
}
