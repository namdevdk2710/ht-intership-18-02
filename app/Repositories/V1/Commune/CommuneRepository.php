<?php

namespace App\Repositories\V1\Commune;

use App\Repositories\BaseRepository;
use App\Models\Commune;

class CommuneRepository extends BaseRepository implements CommuneRepositoryInterface
{
    public function getModel()
    {
        return Commune::class;
    }

    public function showCommuneInDistrict($request)
    {
        return $this->model->where('district_id', $request->district_id)->pluck('name', 'id')->all();
    }
}
