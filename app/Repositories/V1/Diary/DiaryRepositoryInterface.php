<?php

namespace App\Repositories\V1\Diary;

interface DiaryRepositoryInterface
{
    public function save($requestId, $userId, $bloodBagId, $note);
    public function search($request);
    public function getDashboardData();
}
