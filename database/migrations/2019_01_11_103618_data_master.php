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
        $table->integer('id')->unsigned()->primary();
        $table->string('nama_asset');
        $table->string('keterangan');
//        $table->integer('turunan_id')->unsigned()->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('data_master');
    }
}
