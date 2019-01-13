<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sskel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sskel', function (Blueprint $table) {
            $table->string('kd_bid')->nullable()->index();
            $table->string('kd_gol')->nullable()->index();
            $table->string('kd_kel')->nullable()->index();
            $table->string('kd_skel')->nullable()->index();
            $table->string('kd_sskel')->nullable()->index();
            $table->string('ur_sskel');
            $table->string('satuan');
            $table->string('kd_brg')->unique()->primary();
            $table->string('dasar');


            $table->foreign('kd_bid')->references('kd_bid')->on('skel');
            $table->foreign('kd_gol')->references('kd_gol')->on('skel');
            $table->foreign('kd_kel')->references('kd_kel')->on('skel');
            $table->foreign('kd_skel')->references('kd_skel')->on('skel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sskel');
    }
}
