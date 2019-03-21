<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBag extends Model
{
    protected $fillable = [
        'request_blood_id',
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
        'note',
    ];

    public function requestBlood()
    {
        return $this->belongsTo('App\Models\RequestBlood');
    }

    public function wareHouse()
    {
        return $this->belongsTo('App\Models\WareHouse', 'wareHouse_id');
    }

    public function diary()
    {
        return $this->hasOne('App\Models\Diary');
    }
}
