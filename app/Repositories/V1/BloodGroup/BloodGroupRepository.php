<?php

namespace App\Repositories\V1\BloodGroup;

use App\Repositories\BaseRepository;
use App\Models\BloodGroup;
use Illuminate\Support\Facades\Auth;

class BloodGroupRepository extends BaseRepository implements BloodGroupRepositoryInterface
{
    public function getModel()
    {
        return BloodGroup::class;
    }
}
