<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satker extends Model
{
  protected $table = 'satker';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'kode_satker' => 'string',
     'nama_satker' => 'string',
  ];

  protected $fillable = [
     'kode_satker',
     'nama_satker'
  ];
}
