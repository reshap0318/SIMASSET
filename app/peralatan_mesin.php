<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peralatan_mesin extends Model
{
    protected $table = 'peralatan_mesin';

    public function aset(){
        return $this->belongsTo(asset::class, 'id', 'id');
    }
}
