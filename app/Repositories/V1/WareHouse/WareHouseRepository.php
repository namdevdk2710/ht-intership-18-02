<?php

namespace App\Repositories\V1\WareHouse;

use App\Repositories\BaseRepository;
use App\Models\WareHouse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WareHouseRepository extends BaseRepository implements WareHouseRepositoryInterface
{
    public function getModel()
    {
        return WareHouse::class;
    }

    public function index()
    {
        return $this->model->paginate(5);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }
}
