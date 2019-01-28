<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airJaringan extends Model
{
    protected $table = 'air_jaringan';

    public function aset(){
        return $this->belongsTo(asset::class, 'id', 'id');
    }
}
