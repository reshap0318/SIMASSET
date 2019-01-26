<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;

class tanah extends Model
{
  use PostgisTrait;
  protected $table = 'tanah';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
 
  protected $casts = [
     'no_registrasi_aset'    => 'string',
     'status_dokumen'        => 'string',
     'jenis_dokumen'         => 'string',
     'jenis_sertifikat'      => 'string',
     'no_dokumen'            => 'string',
     'tanggal_dokumen'      => 'date',
     'foto_dokumen'          => 'string',
     'luas'                  => 'integer',
     'luas_tanah_bangunan'   => 'integer',
  ];

  protected $fillable = [
    'no_registrasi_aset',
    'status_dokumen',
    'jenis_dokumen',
    'jenis_sertifikat',
    'no_dokumen',
    'tanggal_dokumen',
    'foto_dokumen',
    'luas',
    'luas_tanah_bangunan',
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

  public function asset($value='')
  {
      return $this->belongsTo(asset::class, 'no_registrasi_aset', 'no_registrasi_aset');
  }

    public function namaBarang()
    {
        return $this->belongsTo(sskel::class, 'kd_brg', 'kd_brg');
    }



    public function milik(){
        return $this->belongsTo(kepemilikan::class, 'id_kepemilikan', 'id_kepemilikan');
    }

    public function aset(){
        return $this->belongsTo(asset::class, 'id', 'id');
    }



}
