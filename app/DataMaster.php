<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    protected $table = 'data_master';


     public function banugnan()
    {
        return $this->hasMany(\App\Bangunan::class);
    }

    public function tanah()
    {
        return $this->hasMany(\App\Tanah::class);
    }
}
