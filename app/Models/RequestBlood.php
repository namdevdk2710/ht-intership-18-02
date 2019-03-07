<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestBlood extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
