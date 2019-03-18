<?php

namespace App\Repositories\V1\BloodBag;

interface BloodBagRepositoryInterface
{
    public function getResultByRequestId($id);
    public function confirm($id);
    public function listBloodBagInWareHouse();
    public function updateStatus($id, $request);
}
