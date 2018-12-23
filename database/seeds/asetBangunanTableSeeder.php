<?php

use Illuminate\Database\Seeder;

class asetBangunanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aset_bangunan_gedung')->insert([
          'no_registrasi_aset' => '4.01.01.01.001.00001',
          'jumlah_lantai' => 2,
          'geom' =>''
      ]);
    }
}
