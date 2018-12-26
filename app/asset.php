<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{ 
  protected $table = 'asset';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
    'no_registrasi_aset'    => 'string',
    'kode_barang'           => 'string',
    'kode_satker'           => 'string',
    'nup'                   => 'string',
    'no_kib'                => 'string',
    'kondisi'               => 'integer',
    'merek'                 => 'string',
    'tercatat_dalam'        => 'string',
    'status_absn'           => 'string',
    'status_aset_idle'      => 'string',
    'master_id'             => 'integer',
  ];

  protected $fillable = [
     'no_registrasi_aset',
     'kode_barang',
     'kode_satker',
     'nup',
     'no_kib',
     'kondisi',
     'merek',
     'tercatat_dalam',
     'status_absn',
     'status_aset_idle',
     'foto',
     'master_id'
  ];

  public function master($value='')
  {
      return $this->belongsTo(data_master::class, 'master_id', 'id');
  }

  public function barang($value='')
  {
      return $this->belongsTo(barang::class, 'kode_barang', 'kode_barang');
  }

  public function satker($value='')
  {
      return $this->belongsTo(satker::class, 'kode_satker', 'kode_satker');
  }

}
