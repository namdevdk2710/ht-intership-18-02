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
        $this->model->create([
            'request_blood_id' => $request->input('request_blood_id'),
            'unit' => $request->input('unit'),
            'hbsag' => $request->input('hbsag'),
            'antihiv' => $request->input('antihiv'),
            'antihcv' => $request->input('antihcv'),
            'hbvnat' => $request->input('hbvnat'),
            'hivnat' => $request->input('hivnat'),
            'hcvnat' => $request->input('hcvnat'),
            'syphilis' => $request->input('syphilis'),
            'malaria' => $request->input('malaria'),
            'other' => $request->input('other'),
            'status' => ($request->input('hbsag') || $request->input('antihiv') || $request->input('antihcv')
            || $request->input('hbvnat') || $request->input('hivnat') || $request->input('hcvnat')
            || $request->input('syphilis') || $request->input('malaria')) ? false : true,
        ]);

        return $this->model->orderBy('created_at', 'desc')->first();
    }

    public function getBloodBagByStatus()
    {
        return $this->model->where('note', 'Đã nhập kho')->paginate(5);
    }

    public function getResultByRequestId($id)
    {
        $result = $this->model->where('request_blood_id', $id)->first();
        if (!$result) {
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
            'status' => ($result->hbsag || $result->antihcv || $result->hbvnat || $result->antihiv
            || $result->hivnat || $result->hcvnat || $result->syphilis || $result->malaria ) ? 'Không Đạt': 'Đạt',
            'unit' => $result->unit,
            ];
        }
    }

    public function confirm($id)
    {
        $bloodBag = $this->model->find($id);
        $bloodBag->note = 'Đã xuất';
        $bloodBag->save();

        return $bloodBag;
    }

    public function getImport()
    {
        $bloodBag = $this->model->where('status', 1)
                    ->where('note', '<>', 'Hỏng')
                    ->where('note', '<>', 'Đã nhập kho')
                    ->where('note', '<>', 'Đã xuất')
                    ->where('note', '<>', 'Hết hạn')
                    ->orwhere('status', 1)->where('note', null)->paginate(6);

        return $bloodBag;
    }

    public function confirmImport($id, $request)
    {
        $bloodBag = $this->model->find($id);
        $bloodBag->wareHouse_id = $request->warehouse_id;
        $bloodBag->note = 'Đã nhập kho';
        $bloodBag->save();

        return $bloodBag;
    }

    public function listBloodBagInWareHouse()
    {
        $bloodBag = $this->model->where('status', 1)->where('note', 'Đã nhập kho')->get();

        return $bloodBag;
    }

    public function updateStatus($id, $request)
    {
        $bloodBag = $this->model->find($id);
        $bloodBag->note = $request->note;
        $bloodBag->save();

        return $bloodBag;
    }

    public function getDashboardData()
    {
        return $this->model->where('note', 'Đã nhập kho')->get();
    }
}
