<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestBlood extends Model
{
    protected $fillable = ['user_id', 'calendar_id', 'content', 'status', 'type'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }

    public function bloodBags()
    {
        return $this->hasMany('App\Models\BloodBag');
    }
}
