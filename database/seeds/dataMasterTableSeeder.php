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
            'id'         => '1',
            'nama_asset' => 'Tanah',
            'keterangan' => 'Tetap'
          ]
      ]);
    }
}
