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
        return $this->model->where('type', 'cho')->paginate(5);
    }

    public function received()
    {
        return $this->model->where('type', 'nhan')->paginate(5);
    }

    public function confirm($id)
    {
        $requestBlood = $this->model->find($id);
        $requestBlood->status = !($requestBlood->status);

        return $requestBlood->save();
    }

    public function getById($id)
    {
        $requestBlood = $this->model->find($id);
        if ($this->model->has('bloodBag')->find($requestBlood->id)) {
            $hasBag = true;
        } else {
            $hasBag = false;
        }

        return [
                'hasBag' => $hasBag,
                'fullname' => $requestBlood->user->information->name,
                'birthday' => $requestBlood->user->information->dob,
                'gender' => ($requestBlood->user->information->gender == 1) ? 'Nam' : 'Nữ',
                'cmnd' => $requestBlood->user->information->cmnd,
                'time' => $requestBlood->calendar->time,
                'blood' => $requestBlood->user->information->bloodGroup->name,
            ];
    }
}
