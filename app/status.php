<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
  protected $table = 'status';

  protected $casts = [
     'id_status' => 'integer',
     'ur_status' => 'string',
  ];

  protected $fillable = [
     'id_status',
     'ur_milik'
  ];
}
