<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
  protected $table = 'barang';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'kode_barang' => 'string',
     'nama_barang' => 'string',
  ];

  protected $fillable = [
     'kode_barang',
     'nama_barang'
  ];
}
