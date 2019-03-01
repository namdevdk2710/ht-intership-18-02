<?php

namespace App\Repositories\V1\BloodGroup;

use App\Repositories\BaseRepository;
use App\Models\BloodGroup;
use Illuminate\Support\Facades\Auth;

class BloodGroupRepository extends BaseRepository implements BloodGroupRepositoryInterface
{
    public function getModel()
    {
        return BloodGroup::class;
    }

    public function index()
    {
        return $this->model->paginate(7);
    }

    public function store($data)
    {
        return $this->model->create($data);

    }

    public function update($id, $data)
    {
        $blood= $this->model->find($id);
        $blood->fill($data);
        $blood->save();

        return $blood;
    }
}
