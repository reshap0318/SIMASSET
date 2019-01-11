<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kel', function (Blueprint $table) {
            $table->increments('id_kel');
            $table->integer('id_bid')->unsigned();
            $table->string('kd_kel');
            $table->string('ur_kel');
            $table->foreign('id_bid')->references('id_bid')->on('bid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kel');
    }
}
