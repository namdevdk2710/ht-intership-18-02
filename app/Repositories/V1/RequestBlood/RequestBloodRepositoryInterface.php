<?php

namespace App\Repositories\V1\RequestBlood;

interface RequestBloodRepositoryInterface
{
    public function listDonated();
    public function listRegisterDonated();
    public function listSuccessDonated();
    public function listReceived();
    public function received();
    public function confirm($id);
    public function getById($id);
    public function getDashboardData();
    public function registerDonatedbyCalendar($request, $calendarId, $userId);
    public function registerDonated($request, $userId);
    public function registerReceived($request, $userId);
}
