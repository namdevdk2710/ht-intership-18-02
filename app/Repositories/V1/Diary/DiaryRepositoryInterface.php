<?php

namespace App\Repositories\V1\Diary;

interface DiaryRepositoryInterface
{
    public function save($requestId, $note);
    public function search($request);
    public function getDashboardData();
}
