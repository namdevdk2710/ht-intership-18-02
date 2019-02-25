<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }
}
