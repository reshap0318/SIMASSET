<?php

use Illuminate\Database\Seeder;
use DB;

class satkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('satker')->insert([
          'kode_satker' =>'042010800400928001KD',
          'nama_satker' => 'Fakultas Pertanian'
      ]);
    }
}
