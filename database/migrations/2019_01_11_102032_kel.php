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
            $table->string('kd_bid')->nullable();
            $table->string('kd_gol')->nullable();
            $table->string('kd_kel')->nullable()->index();
            $table->string('ur_kel');

            $table->primary(['kd_bid', 'kd_gol','kd_kel']);
            $table->foreign('kd_gol')->references('kd_gol')->on('bid');
            $table->foreign('kd_bid')->references('kd_bid')->on('bid');
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
        Schema::dropIfExists('kel');
    }
}
