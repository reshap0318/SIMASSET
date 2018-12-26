<?php

use Illuminate\Database\Seeder;

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
            'keterangan' => 'Tetap'
          ],
          [
            'nama_asset' => 'Bangunan dan Ruangan',
            'keterangan'  => 'Tetap'
          ]
      ]);
    }
}
