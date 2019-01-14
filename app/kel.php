<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kel extends Model
{
  protected $table = 'kel';

  protected $casts = [
     'id_kel' => 'integer',
     'id_bid' => 'integer',
     'kd_kel' => 'string',
     'ur_kel' => 'string',
  ];

  protected $fillable = [
     'id_kel',
     'id_bid',
     'kd_kel',
     'ur_kel'
  ];

  public function bid($value='')
  {
      return $this->belongsTo(bid::class, 'kd_bid', 'kd_bid');
  }
}
