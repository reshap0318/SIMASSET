<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Skel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skel', function (Blueprint $table) {
            $table->string('kd_bid')->nullable()->index();
            $table->string('kd_gol')->nullable()->index();
            $table->string('kd_kel')->nullable()->index();
            $table->string('kd_skel')->nullable()->index();
            $table->string('ur_skel');

            $table->primary(['kd_bid', 'kd_gol','kd_kel','kd_skel']);

            $table->foreign('kd_gol')->references('kd_gol')->on('kel');
            $table->foreign('kd_bid')->references('kd_bid')->on('kel');
            $table->foreign('kd_kel')->references('kd_kel')->on('kel');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skel');
    }
}
