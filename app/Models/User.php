<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username', 'email', 'password', 'role'];

    public function calendar()
    {
        return $this->hasOne('App\Models\Calendar');
    }

    public function information()
    {
        return $this->hasOne('App\Models\Information');
    }

    public function requestBlood()
    {
        return $this->hasOne('App\Models\RequestBlood');
    }
}
