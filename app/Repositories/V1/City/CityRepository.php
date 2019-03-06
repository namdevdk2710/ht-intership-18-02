<?php

namespace App\Repositories\V1\City;

use App\Repositories\BaseRepository;
use App\Models\City;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function getModel()
    {
        return City::class;
    }

    public function getCity()
    {
        return $this->model->pluck('name', 'id')->all();
    }
}
