<?php

namespace App\Repositories\V1\User;

interface UserRepositoryInterface
{
    public function login($request);
    public function logout();
    public function userLogin($request);
    public function changeAdminPassword($request);
    public function getDashboardData();
    public function registerDonated($request);
    public function mailLabResult($id);
}
