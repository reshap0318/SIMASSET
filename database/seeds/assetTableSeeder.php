<?php

use Illuminate\Database\Seeder;

class assetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset')->insert([
        [
          'no_registrasi_aset' => '2.01.03.02.999.00001',
          'kode_barang' => '20103029999',
          'kode_satker' => '042010800400928001KD',
          'nup' => '1',
          'no_kib' => '1',
          'kondisi' => 1,
          'merek' => 'Rehap selasar dan Lap. parkir',
          'tercatat_dalam' => 'KIB (Kartu Identitas Barang)',
          'status_sbsn' => '',
          'status_aset_idle'=> '',
          'foto'=> '',
          'master_id'          => 1
        ],
        [
          'no_registrasi_aset' => '4.01.01.01.001.00001',
          'kode_barang' => '4010101001',
          'kode_satker' => '042010800400928001KD',
          'nup' => '1',
          'no_kib' => '1',
          'kondisi' => 1,
          'merek' => 'Dekanat',
          'tercatat_dalam' => 'KIB (Kartu Identitas Barang)',
          'status_sbsn' => '',
          'status_aset_idle'=> '',
          'foto'=> '',
          'master_id'          => 2
        ]
      ]);
    }
}
