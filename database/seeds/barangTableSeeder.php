<?php

use Illuminate\Database\Seeder;

class barangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('barang')->insert([
          'kode_barang' => '20103029999',
          'nama_barang' => 'Tanah Lapangan Parkir'
      ],[
          'kode_barang' => '4010101001',
          'nama_barang' => 'Bangunan Gedung Kantor Permanen'
      ]);
    }
}
