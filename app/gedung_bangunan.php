<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gedung_bangunan extends Model
{
    protected $table = 'gedung_bangunan';

    public function aset(){
        return $this->belongsTo(asset::class, 'id', 'id');
    }
}
