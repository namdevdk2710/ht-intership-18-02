<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function calendar()
    {
        return $this->hasOne('App\Models\Calendar');
    }
}
