<?php

namespace App\Repositories\V1\BloodBag;

interface BloodBagRepositoryInterface
{
    public function getResultByRequestId($id);
}
