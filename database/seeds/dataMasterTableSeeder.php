<?php

use Illuminate\Database\Seeder;
use DB;

class dataMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('data_master')->insert([
          [
            'nama_asset' => 'Tanah',
            'keteragan' => 'Tetap'
          ],
          [
            'nama_asset' => 'Bangunan dan Ruangan',
            'keteragan'  => 'Tetap'
          ]
      ]);
    }
}
