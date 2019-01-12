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
            $table->increments('id_sskel');
            $table->integer('id_skel')->unsigned();
            $table->string('kd_sskel');
            $table->string('ur_sskel');
            $table->string('satuan');
            $table->integer('kd_brg')->unique();
            $table->string('dasar');

            $table->foreign('id_skel')->references('id_skel')->on('skel');
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
