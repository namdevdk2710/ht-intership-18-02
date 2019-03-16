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

    public function getResultByRequestId($id)
    {
        $result = $this->model->where('requestBlood_id', $id)->first();
        if(!$result) {
            return [
            'exist' => false,
            ];
        } else {
            return [
            'exist' => true,
            'hbsag' => ($result->hbsag == 1) ? 'Dương tính': 'Âm tính',
            'antihiv' => ($result->antihiv == 1) ? 'Dương tính': 'Âm tính',
            'antihcv' => ($result->antihcv == 1) ? 'Dương tính': 'Âm tính',
            'hbvnat' => ($result->hbvnat == 1) ? 'Dương tính': 'Âm tính',
            'hivnat' => ($result->hivnat == 1) ? 'Dương tính': 'Âm tính',
            'hcvnat' => ($result->hcvnat == 1) ? 'Dương tính': 'Âm tính',
            'syphilis' => ($result->syphilis == 1) ? 'Dương tính': 'Âm tính',
            'malaria' => ($result->malaria == 1) ? 'Dương tính': 'Âm tính',
            'status' => ($result->status == 1) ? 'Chưa hết hạn': 'Đã hết hạn',
            'unit' => $result->unit,
            'warehouse' => $result->warehouse->address,
            ];
        }
    }
}
