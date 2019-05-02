<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $fillable = ['name', 'address', 'commune_id'];

    public function bloodBags()
    {
        return $this->hasMany('App\Models\BloodBag');
    }

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }
}
