<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $fillable = ['name'];

    public function informations()
    {
        return $this->hasMany('App\Models\Information');
    }

    public function request_blood()
    {
        return $this->hasOne('App\Models\RequestBlood');
    }
}
