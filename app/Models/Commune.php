<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function calendar()
    {
        return $this->hasOne('App\Models\Calendar');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function informations()
    {
        return $this->hasMany('App\Models\Information');
    }

}
