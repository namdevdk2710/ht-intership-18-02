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

    public function save($requestId, $note)
    {
        return $this->model->create([
            'request_blood_id' => $requestId,
            'user_id' => Auth::id(),
            'note' => $note,
        ]);
    }
}
