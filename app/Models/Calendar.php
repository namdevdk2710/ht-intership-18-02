<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calendar extends Model
{
    public function getTimeAttribute($value)
    {
        return date("h:m d-m-Y", strtotime($value));
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }
}
