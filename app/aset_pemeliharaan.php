<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aset_pemeliharaan extends Model
{
    protected $table = 'pemeliharaan_aset';

    public function asset($value='')
    {
        return $this->hasOne(asset::class, 'id', 'aset_id');
    }
}
