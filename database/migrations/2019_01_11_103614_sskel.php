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
            $table->string('kd_bid')->nullable();
            $table->string('kd_gol')->nullable();
            $table->string('kd_kel')->nullable();
            $table->string('kd_skel')->nullable();
            $table->string('kd_sskel');
            $table->string('ur_sskel');
            $table->string('satuan');
            $table->integer('kd_brg')->unique();
            $table->string('dasar');

            $table->primary(['kd_bid', 'kd_gol','kd_kel','kd_sskel']);

            $table->foreign('kd_bid')->references('kd_bid')->on('skel');
            $table->foreign('kd_gol')->references('kd_gol')->on('skel');
//            $table->foreign('kd_kel')->references('kd_kel')->on('skel');
//            $table->foreign('kd_skel')->references('kd_skel')->on('skel');

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
