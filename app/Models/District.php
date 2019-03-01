<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function communes()
    {
        return $this->hasMany('App\Models\Commune');
    }
}
