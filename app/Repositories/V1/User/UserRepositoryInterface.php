<?php

namespace App\Repositories\V1\User;

interface UserRepositoryInterface
{
    public function login($request);
    public function logout();
    public function userLogin($request);
}
