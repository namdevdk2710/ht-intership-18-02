<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function district()
    {
        return $this->hasOne('App\Models\District');
    }
}