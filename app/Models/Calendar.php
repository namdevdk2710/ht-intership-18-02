<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['user_id', 'commune_id', 'time', 'address'];

    public function getTimeAttribute($value)
    {
        return date('h:m d-m-Y', strtotime($value));
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }

    public function requestBloods()
    {
        return $this->hasMany('App\Models\RequestBlood');
    }
}
