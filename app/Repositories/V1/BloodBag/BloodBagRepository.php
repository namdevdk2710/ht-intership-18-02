<?php

namespace App\Repositories\V1\BloodBag;

use App\Repositories\BaseRepository;
use App\Models\BloodBag;

class BloodBagRepository extends BaseRepository implements BloodBagRepositoryInterface
{
    public function getModel()
    {
        return BloodBag::class;
    }

    public function store($request)
    {
        return $this->model->create([
            'requestBlood_id' => $request->input('request_blood_id'),
            'wareHouse_id' => $request->input('wareHouse_id'),
            'unit' => $request->input('unit'),
            'status' => $request->input('status'),
            'hbsag' => $request->input('hbsag'),
            'antihiv' => $request->input('antihiv'),
            'antihcv' => $request->input('antihcv'),
            'hbvnat' => $request->input('hbvnat'),
            'hivnat' => $request->input('hivnat'),
            'hcvnat' => $request->input('hcvnat'),
            'syphilis' => $request->input('syphilis'),
            'malaria' => $request->input('malaria'),
            'other' => $request->input('other'),
        ]);
    }

    public function getBloodBagByStatus()
    {
        $bloodBag = $this->model->where('note', 'Đã nhập kho')->get();

        return $bloodBag;
    }

    public function confirm($id)
    {
        $bloodBag = $this->model->find($id);
        $bloodBag->note = 'Đã xuất';
        $bloodBag->save();

        return $bloodBag;
    }
}
