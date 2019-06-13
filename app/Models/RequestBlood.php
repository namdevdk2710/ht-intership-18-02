<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestBlood extends Model
{
    protected $fillable = ['user_id', 'calendar_id', 'content', 'status', 'type', 'blood_group_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }

    public function bloodBag()
    {
        return $this->hasMany('App\Models\BloodBag');
    }

    public function diaries()
    {
        return $this->hasMany('App\Models\Diary');
    }

    public function bloodGroup()
    {
        return $this->hasOne('App\Models\BloodGroup');
    }
}
