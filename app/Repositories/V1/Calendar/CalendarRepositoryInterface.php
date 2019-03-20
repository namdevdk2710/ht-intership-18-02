<?php

namespace App\Repositories\V1\Calendar;

interface CalendarRepositoryInterface
{
    public function listCalendar($num);
    public function getDashboardData();
    public function getFutureCalendar($num);
}
