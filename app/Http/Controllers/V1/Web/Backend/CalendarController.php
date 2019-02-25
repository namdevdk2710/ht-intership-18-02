<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;

class CalendarController extends Controller
{
    protected $repository;

    public function __construct(CalendarRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function listCalendar()
    {
        $calendars = $this->repository->listCalendar();
        return view('backend.calendar.list_calendar', compact('calendars'));
    }
}
