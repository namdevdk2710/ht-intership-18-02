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

    public function save($requestId, $note)
    {
        return $this->model->create([
            'request_blood_id' => $requestId,
            'user_id' => Auth::id(),
            'note' => $note,
        ]);
    }

    public function search($request)
    {
        if ($request->input('search') == '') {
            return $this->model->paginate(7);
        }
        if ($request->input('code') == 'request_id') {
            return $this->model->where('request_blood_id', $request->input('search'))->paginate(7);
        } elseif ($request->input('code') == 'cmnd') {
            return $this->model->leftJoin('request_bloods', 'diaries.request_blood_id', '=', 'request_bloods.id')
                        ->leftJoin('users', 'request_bloods.user_id', '=', 'users.id')
                        ->leftJoin('information', 'information.user_id', '=', 'users.id')
                        ->where('cmnd', $request->input('search'))
                        ->select('diaries.*', 'information.cmnd')
                        ->paginate(7);
        }
    }

    public function getDashboardData()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }
}
