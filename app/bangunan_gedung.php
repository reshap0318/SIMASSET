<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bangunan_gedung extends Model
{
  protected $table = 'bangunan_gedung';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'no_registrasi_aset'    => 'string',
     'jumlah_lantai'         => 'integer',
  ];

  protected $fillable = [
     'no_registrasi_aset',
     'jumlah_lantai'
  ];

  public function asset($value='')
  {
      return $this->belongsTo(asset::class, 'no_registrasi_aset', 'no_registrasi_aset');
  }
}
