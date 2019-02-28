<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = ['name', 'gender', 'dob', 'cmnd', 'address', 'phone', 'user_id', 'blood_id', 'commune_id'];

    public function bloodGroup()
    {
        return $this->belongsTo('App\Models\BloodGroup');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }

}
