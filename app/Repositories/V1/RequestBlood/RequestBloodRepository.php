<?php

namespace App\Repositories\V1\RequestBlood;

use App\Repositories\BaseRepository;
use App\Models\RequestBlood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RequestBloodRepository extends BaseRepository implements RequestBloodRepositoryInterface
{
    public function getModel()
    {
        return RequestBlood::class;
    }

    public function listDonated()
    {
        return $this->model
                ->where('type', 'cho')
                ->where('calendar_id', null)
                ->where('status', 0)
                ->orderBy('id', 'dec')
                ->paginate(5);
    }

    public function listRegisterDonated()
    {
        return $this->model
                ->where('type', 'cho')
                ->where('status', 0)
                ->where('calendar_id', '<>', null)
                ->orderBy('id', 'dec')
                ->paginate(5);
    }

    public function listSuccessDonated()
    {
        return $this->model
            ->rightJoin('blood_bags', 'request_bloods.id', '=', 'blood_bags.request_blood_id')
            ->select('request_bloods.*', 'blood_bags.id')
            ->orderBy('request_bloods.id', 'dec')
            ->paginate(5);
    }

    public function listReceived()
    {
        return $this->model
            ->where('type', 'nhan')
            ->orderBy('id', 'dec')
            ->paginate(5);
    }

    public function listReceivedSuccess()
    {
        return $this->model
            ->rightJoin('diaries', 'request_bloods.id', '=', 'diaries.request_blood_id')
            ->select('request_bloods.*', 'diaries.blood_bag_id')
            ->orderBy('id', 'dec')
            ->paginate(5);
    }

    public function received()
    {
        return $this->model
            ->where('type', 'nhan')
            ->where('status', 0)
            ->orderBy('id', 'dec')
            ->paginate(5);
    }

    public function receivedByStatus()
    {
        return $this->model
            ->where('type', 'nhan')
            ->where('status', 0)
            ->orderBy('id', 'dec')
            ->paginate(5);
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

    public function registerDonatedbyCalendar($request, $calendarId, $userId)
    {
        $requestBlood = $this->model->where('user_id', $userId)->orderBy('created_at', 'dec')->first();

        if ($this->model->where([
            ['user_id', $userId],
            ['status', 0],
        ])->orderBy('user_id', 'dec')->first()) {
            return false;
        } elseif (isset($requestBlood)) {
            $expiryDate = $requestBlood->created_at->addMonth(3);
            $now = Carbon::now();

            if ($now < $expiryDate) {
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

    public function registerDonated($request, $userId)
    {
        $requestBlood = $this->model->where('user_id', $userId)->orderBy('created_at', 'dec')->first();

        if ($this->model->where([
            ['user_id', $userId],
            ['status', 0],
        ])->orderBy('user_id', 'dec')->first()) {
            return false;
        } elseif (isset($requestBlood)) {
            $expiryDate = $requestBlood->created_at->addMonth(3);
            $now = Carbon::now();

            if ($now < $expiryDate) {
                return 'time';
            }
        }

        return $this->model->create([
                'user_id' => $userId,
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
            'blood_group_id' => $request->bloodgroup,
        ]);
    }
}
