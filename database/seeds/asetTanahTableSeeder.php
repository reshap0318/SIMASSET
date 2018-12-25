<?php

use Illuminate\Database\Seeder;
use DB;

class asetTanahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tanah')->insert([
        'no_registrasi_aset' => '2.01.03.02.999.00001',
        'status_dokumen'     => '',
        'jenis_dokumen'      => '',
        'jenis_sertifikat'   =>'',
        'no_dokumen'         =>'',
        'tanggal_dokumen'    => '2018-10-26 10:47:20',
        'luas'               => 123,
        'luas_tanah_bangunan'=>80,
        'geom'               => null
      ]);
    }
}
