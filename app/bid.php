<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
  protected $table = 'bid';

  protected $casts = [
     'id_bid' => 'integer',
     'kd_bid' => 'string',
     'kd_gol' => 'string',
     'ur_bid' => 'string',
  ];

  protected $fillable = [
     'id_bid',
     'kd_bid',
     'kd_gol',
     'ur_bid'
  ];

  public function gol($value='')
  {
      return $this->belongsTo(gol::class, 'kd_gol', 'kd_gol');
  }

}
