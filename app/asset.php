<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
  protected $table = 'asset';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [

    'kd_brg'               => 'string',
    'nup'                   => 'string',
    'no_kib'                => 'string',
    'master_id'             => 'integer'
  ];

  protected $fillable = [
     'no_registrasi_aset',
     'kode_barang',
     'kode_satker',
     'nup',
     'no_kib',
     'kondisi',
     'merek',
     'tercatat_dalam',
     'status_sbsn',
     'status_aset_idle',
     'foto',
     'master_id'
  ];

  public function master($value='')
  {
      return $this->belongsTo(data_master::class, 'master_id', 'id');
  }

//  public function barang($value='')
//  {
//      return $this->belongsTo(barang::class, 'kode_barang', 'kode_barang');
//  }
//
//  public function satker($value='')
//  {
//      return $this->belongsTo(satker::class, 'kode_satker', 'kode_satker');
//  }

    public function trn(){
        return $this->belongsTo(transaksi::class, 'kd_trn', 'kd_trn');
    }

    public function status(){
        return $this->belongsTo(status::class, 'id_status', 'id_status');
    }

    public function tanah()
    {
        return $this->belongsTo(satker::class, 'id', 'id');
    }

    public function sskel(){
        return $this->belongsTo(sskel::class, 'kd_brg', 'kd_brg');
    }

    public function peralatan_mesin(){
        return $this->belongsTo(peralatan_mesin::class, 'id', 'id');
    }

}
