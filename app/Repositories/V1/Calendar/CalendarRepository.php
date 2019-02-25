<?php

namespace App\Repositories\V1\Calendar;

use App\Repositories\BaseRepository;
use App\Models\Calendar;

class CalendarRepository extends BaseRepository implements CalendarRepositoryInterface
{
    public function getModel()
    {
        return Calendar::class;
    }

    public function listCalendar()
    {
        return Calendar::paginate(7);
    }
}
