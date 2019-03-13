<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gol extends Model
{
  protected $table = 'gol';

  protected $casts = [
     'kd_gol' => 'string',
     'ur_gol' => 'string',
  ];

  protected $fillable = [
     'kd_gol',
     'ur_gol'
  ];
}
