<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
	 protected $table = 'aset_bangunan_gedung';

	  public $fillable = [
        'no_registrasi_aset',
        'jumlah_lantai',
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

    public function bangunan()
    {
        return $this->belongsTo(\App\DataMaster::class);
    }

}
