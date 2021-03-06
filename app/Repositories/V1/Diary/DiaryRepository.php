<?php

namespace App\Repositories\V1\Diary;

use App\Repositories\BaseRepository;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;

class DiaryRepository extends BaseRepository implements DiaryRepositoryInterface
{
    public function getModel()
    {
        return Diary::class;
    }

    public function index()
    {
        return $this->model->paginate(7);
    }

    public function save($requestId, $userId, $bloodBagId, $note)
    {
        return $this->model->create([
            'request_blood_id' => $requestId,
            'user_id' => $userId,
            'blood_bag_id' => $bloodBagId,
            'note' => $note,
        ]);
    }

    public function search($request)
    {
        if ($request->input('search') == '') {
            return $this->model->paginate(5);
        }
        if ($request->input('code') == 'request_id') {
            return $this->model->where('request_blood_id', $request->input('search'))
            ->paginate(5);
        } elseif ($request->input('code') == 'cmnd') {
            return $this->model
                ->leftJoin('request_bloods', 'diaries.request_blood_id', '=', 'request_bloods.id')
                ->leftJoin('users', 'request_bloods.user_id', '=', 'users.id')
                ->leftJoin('information', 'information.user_id', '=', 'users.id')
                ->where('cmnd', $request->input('search'))
                ->select('diaries.*', 'information.cmnd')
                ->paginate(5);
        }
    }

    public function searchFrontend($request)
    {
        if ($request->input('search') == '') {
            return $this->model->paginate(5);
        }
        if ($request->input('code') == 'request_id') {
            return $this->model->where('request_blood_id', $request->input('search'))
                ->leftJoin('request_bloods', 'diaries.request_blood_id', '=', 'request_bloods.id')
                ->where('request_bloods.type', 'cho')
                ->paginate(5);
        } elseif ($request->input('code') == 'cmnd') {
            return $this->model
                ->leftJoin('request_bloods', 'diaries.request_blood_id', '=', 'request_bloods.id')
                ->where('type', 'cho')
                ->leftJoin('users', 'request_bloods.user_id', '=', 'users.id')
                ->leftJoin('information', 'information.user_id', '=', 'users.id')
                ->where('cmnd', $request->input('search'))
                ->select('diaries.*', 'information.cmnd')
                ->paginate(5);
        }
    }

    public function searchDiary($request)
    {
        if ($request->input('search') == '') {
            return $this->model->paginate(7);
        }
        if ($request->input('code') == 'id') {
            return $this->model
                ->leftJoin('users', 'diaries.user_id', '=', 'users.id')
                ->where('diaries.user_id', $request->input('search'))
                ->select('diaries.*', 'users.id')
                ->paginate(5);
        } elseif ($request->input('code') == 'cmnd') {
            return $this->model
                    ->leftJoin('users', 'diaries.user_id', '=', 'users.id')
                    ->leftJoin('information', 'information.user_id', '=', 'users.id')
                    ->where('information.cmnd', $request->input('search'))
                    ->select('diaries.*')
                    ->paginate(5);
        }
    }

    public function getDashboardData()
    {
        return $this->model->orderBy('created_at', 'desc')->paginate(5);
    }
}
