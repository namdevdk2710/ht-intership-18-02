<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function calendar()
    {
        return $this->hasOne('App\Models\Calendar');
    }
}
