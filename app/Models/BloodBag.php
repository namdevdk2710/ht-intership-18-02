<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBag extends Model
{
    protected $fillable = [
        'requestBlood_id',
        'wareHouse_id',
        'unit',
        'status',
        'hbsag',
        'antihiv',
        'antihcv',
        'hbvnat',
        'hivnat',
        'hcvnat',
        'syphilis',
        'malaria',
        'other',
    ];

    public function requestBlood()
    {
        return $this->belongsTo('App\Models\RequestBlood', 'requestBlood_id');
    }

    public function wareHouse()
    {
        return $this->belongsTo('App\Models\WareHouse', 'wareHouse_id');
    }
}
