<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kepemilikan extends Model
{
  protected $table = 'kepemilikan';

  protected $casts = [
     'id_kepemilikan' => 'integer',
     'ur_milik' => 'string',
  ];

  protected $fillable = [
     'id_kepemilikan',
     'ur_milik'
  ];

}
