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
        return $this->model->create([
            'name' => $data['name'],
            'address' => $data['address'],
            'commune_id' => $data['commune'],
        ]);
    }

    public function update($id, $data)
    {
        $warehouse = $this->model->find($id);
        $warehouse->name = $data->input('name');
        $warehouse->address = $data->input('address');
        $warehouse->commune_id = $data->input('commune');

        return $warehouse->save();
    }

    public function getWareHouseAsArray()
    {
        return $this->model->pluck('name', 'id')->all();
    }
}
