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
      DB::table('bangunan_gedung')->insert([
          'no_registrasi_aset' => '2.01.03.02.999.00001',
          'jumlah_lantai'      => 2,
          'geom'               => null
      ]);
    }
}
