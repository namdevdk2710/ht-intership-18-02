<?php

namespace App\Repositories\V1\Information;

interface InformationRepositoryInterface
{
    public function register($request, $userId);
    public function updateBloodGroup($request, $userId);
}
