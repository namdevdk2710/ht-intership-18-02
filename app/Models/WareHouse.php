<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $fillable = ['namme', 'address'];

    public function bloodBag()
    {
        return $this->beLongsTo('App\Models\BloodBag');
    }
}
