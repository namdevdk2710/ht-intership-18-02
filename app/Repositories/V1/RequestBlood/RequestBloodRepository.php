<?php

namespace App\Repositories\V1\RequestBlood;

use App\Repositories\BaseRepository;
use App\Models\RequestBlood;
use Illuminate\Support\Facades\Auth;

class RequestBloodRepository extends BaseRepository implements RequestBloodRepositoryInterface
{
    public function getModel()
    {
        return RequestBlood::class;
    }

    public function donated()
    {
        return $this->model->where('type', 'cho')->where('status', 0)->paginate(5);
    }

    public function received()
    {
        return $this->model->where('type', 'nhan')->where('status', 0)->paginate(5);
    }

    public function receivedByStatus()
    {
        return $this->model->where('type', 'nhan')->where('status', 0)->paginate(5);
    }

    public function confirm($id)
    {
        $requestBlood = $this->model->find($id);
        $requestBlood->status = 1;

        return $requestBlood->save();
    }

    public function getById($id)
    {
        $requestBlood = $this->model->where('type', 'cho')->where('status', 1)->find($id);
        if (isset($requestBlood->user->information->blood_id)) {
            $blood = $requestBlood->user->information->bloodGroup->name;
        } else {
            $blood = 'Chưa cập nhật';
        }
        if ($requestBlood) {
            if ($this->model->has('bloodBag')->find($requestBlood->id)) {
                $hasBag = true;
            } else {
                $hasBag = false;
            }

            return [
                    'hasRequest' => true,
                    'hasBag' => $hasBag,
                    'fullname' => $requestBlood->user->information->name,
                    'birthday' => $requestBlood->user->information->dob,
                    'gender' => ($requestBlood->user->information->gender == 1) ? 'Nam' : 'Nữ',
                    'cmnd' => $requestBlood->user->information->cmnd,
                    'time' => $requestBlood->calendar->time,
                    'blood' => $blood,
                ];
        } else {
            return ['hasRequest' => false];
        }
    }

    public function getDashboardData()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function registerDonated($request, $calendarId, $userId)
    {
        $requestBlood = $this->model->where('user_id', $userId)->orderBy('updated_at', 'dec')->first();

        if ($this->model->where([
            ['user_id', $userId],
            ['status', 0],
        ])->first()) {
            return false;
        }
        elseif(isset($requestBlood)){
            $week = strtotime(date('d-m-Y', strtotime($requestBlood->updated_at)) . ' +12 week');
            $expiryDate = strftime('%d-%m-%Y', $week);
            $today = date('Y-m-d');
            if($today < $expiryDate ){
                return 'time';
            }
        }

        return $this->model->create([
                'user_id' => $userId,
                'calendar_id' => $calendarId,
                'content' => 'Đăng ký hiến máu',
                'status' => 0,
                'type' => 'cho',
        ]);
    }

    public function registerReceived($request, $userId)
    {
        return $this->model->create([
            'user_id' => $userId,
            'content' => 'Đăng ký nhận máu',
            'status' => 0,
            'type' => 'nhan',
            'user_id' => $userId,
        ]);
    }
}
