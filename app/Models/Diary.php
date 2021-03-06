<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

    protected $fillable = ['note', 'request_blood_id', 'user_id', 'blood_bag_id'];

    public function requestBlood()
    {
        return $this->belongsTo('App\Models\RequestBlood');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function bloodBag()
    {
        return $this->belongsTo('App\Models\BloodBag');
    }
}
