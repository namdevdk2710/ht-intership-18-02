<?php

namespace App\Repositories\V1\Diary;

interface DiaryRepositoryInterface
{
    public function save($request_id, $note);
}
