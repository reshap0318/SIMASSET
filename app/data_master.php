<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_master extends Model
{
  protected $table = 'data_master';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'id' => 'string',
     'nama_asset' => 'string',
     'keterangan' => 'string',
     'turunan_id' => 'string',
  ];

  protected $fillable = [
     'id',
     'kode_asset',
     'keterangan',
     'turunan_id'
  ];

  public function rumpun($value='')
  {
      return $this->hasMany(data_master::class, 'turunan_id', 'id');
  }

  public function kepala($value='')
  {
      return $this->belongsTo(data_master::class, 'turunan_id', 'id');
  }

  public function aset()
  {
      return $this->hasMany(asset::class, 'master_id', 'id');;
  }

}
