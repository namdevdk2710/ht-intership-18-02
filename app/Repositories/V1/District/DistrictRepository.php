<?php

namespace App\Repositories\V1\District;

use App\Repositories\BaseRepository;
use App\Models\District;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    public function getModel()
    {
        return District::class;
    }

    public function showDistrictInCity($request)
    {
        return $this->model->where('city_id', $request->city_id)->pluck('name', 'id')->all();
    }
}
