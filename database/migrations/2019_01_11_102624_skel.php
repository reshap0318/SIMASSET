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
            $table->increments('id_skel');
            $table->integer('id_kel')->unsigned();
            $table->string('kd_skel');
            $table->string('ur_skel');
            
            $table->foreign('id_kel')->references('id_kel')->on('kel');
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
