<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    protected $table = 'data_master';


     public function banugnans()
    {
        return $this->hasMany(\App\Bangunan::class);
    }
}
