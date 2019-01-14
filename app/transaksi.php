<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
  protected $table = 'transaksi';

  protected $casts = [
     'kd_trn' => 'integer',
     'ur_trn' => 'string',
  ];

  protected $fillable = [
     'kd_trn',
     'ur_milik'
  ];
}
