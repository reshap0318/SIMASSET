<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skel extends Model
{
  protected $table = 'skel';

  protected $casts = [
     'id_skel' => 'integer',
     'id_kel' => 'integer',
     'kd_skel' => 'string',
     'ur_skel' => 'string',
  ];

  protected $fillable = [
     'id_skel',
     'id_kel',
     'kd_skel',
     'ur_skel'
  ];

  public function kel($value='')
  {
      return $this->belongsTo(kel::class, 'id_kel', 'id_kel');
  }
}
