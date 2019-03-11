<?php

namespace App\Repositories\V1\RequestBlood;

use App\Repositories\BaseRepository;
use App\Models\RequestBlood;

class RequestBloodRepository extends BaseRepository implements RequestBloodRepositoryInterface
{
    public function getModel()
    {
        return RequestBlood::class;
    }

    public function donated()
    {
        return $this->model->where('type', 'cho')->paginate(10);
    }
}
