<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationTurunanDatamaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('data_master', function (Blueprint $table) {
//            $table->foreign('turunan_id')->references('id')->on('data_master');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('data_master', function (Blueprint $table) {
          $table->dropColumn('turunan_id');
      });
    }
}
