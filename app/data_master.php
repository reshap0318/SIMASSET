<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_master extends Model
{
  protected $table = 'data_master';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'kode_asset' => 'string',
     'keterangan' => 'string',
  ];

  protected $fillable = [
     'kode_asset',
     'keterangan'
  ];
  
}
