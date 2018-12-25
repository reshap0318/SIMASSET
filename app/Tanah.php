<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    protected $table = 'aset_tanah';

    public $fillable = [
        'no_registrasi_aset',
        'status_dokumen',
        'jenis_dokumen',
        'jenis_sertifikat',
        'no_dokumen',
        'tanggal_dokumen',
        'luas',
        'geom'
        
    ];

	protected $postgisFields = [
        'geom'
    ];

    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 0
        ]
    ];

    protected $casts = [
        'id' => 'integer',
        'no_registrasi_aset' => 'integer',
        'jumlah_lantai' => 'integer'
       
    ];

     public function Tanah()
    {
        return $this->belongsTo(\App\DataMaster::class);
    }
}
