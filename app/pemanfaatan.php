<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemanfaatan extends Model
{
    protected $table = 'pemanfaatan_aset';

    public function asset($value='')
    {
        return $this->hasOne(asset::class, 'id', 'aset_id');
    }
}
