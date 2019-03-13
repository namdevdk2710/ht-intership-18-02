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
            'unit' => 12345,
            'status' => True,
            'hbsag' => $request->input('hbsag'),
            'antihiv' => $request->input('antihiv'),
            'antihcv' => $request->input('antihcv'),
            'hbvnat' => $request->input('hbvnat'),
            'hivnat' => $request->input('hivnat'),
            'hcvnat' => $request->input('hcvnat'),
            'syphilis' => $request->input('syphilis'),
            'malaria' => $request->input('malaria'),
            'requotherest' => $request->input('other'),
        ]);
    }
}
