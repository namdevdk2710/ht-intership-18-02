<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $fillable = ['name', 'address'];

    public function bloodBags()
    {
        return $this->hasMany('App\Models\BloodBag');
    }
}
