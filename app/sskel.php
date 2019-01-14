<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sskel extends Model
{
  protected $table = 'sskel';

  protected $casts = [
     'id_sskel' => 'integer',
     'id_skel' => 'integer',
     'kd_sskel' => 'string',
     'ur_sskel' => 'string',
     'satuan' => 'string',
     'kd_brg' => 'integer',
     'dasar' => 'string',
  ];

  protected $fillable = [
     'id_sskel',
     'id_skel',
     'kd_sskel',
     'ur_sskel',
     'satuan',
     'kd_brg',
     'dasar',
  ];

  public function skel($value='')
  {
      return $this->belongsTo(skel::class, 'kd_skel', 'kd_skel');
  }
}
