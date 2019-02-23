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
            $table->string('kd_bid')->index();
            $table->string('kd_gol')->index();
            $table->string('kd_kel')->index();
            $table->string('kd_skel')->index();
            $table->string('kd_sskel');
            $table->string('ur_sskel');
            $table->string('satuan');
            $table->string('kd_brg')->primary();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sskel');
    }
}
