<?php

namespace App\Repositories\V1\RequestBlood;

interface RequestBloodRepositoryInterface
{
    public function donated();
    public function received();
    public function confirm($id);
    public function getById($id);
    public function getDashboardData();
}
