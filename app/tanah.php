<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanah extends Model
{
  protected $table = 'tanah';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'no_registrasi_aset'    => 'string',
     'status_dokumen'        => 'string',
     'jenis_dokumen'         => 'string',
     'jenis_sertifikat'      => 'string',
     'no_dokumen'            => 'string',
     'tanggal_dokument'      => 'date',
     'foto_dokumen'          => 'string',
     'luas'                  => 'integer',
     'luas_tanah_bangunan'   => 'integer',
  ];

  protected $fillable = [
    'no_registrasi_aset',
    'status_dokumen',
    'jenis_dokumen',
    'jenis_sertifikat',
    'no_dokumen',
    'tanggal_dokument',
    'foto_dokumen',
    'luas',
    'luas_tanah_bangunan'
  ];

  public function asset($value='')
  {
      return $this->belongsTo(asset::class, 'no_registrasi_aset', 'no_registrasi_aset');
  }
}
