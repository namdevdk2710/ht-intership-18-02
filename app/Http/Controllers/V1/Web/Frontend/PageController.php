<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;

class PageController extends Controller
{
    protected $calendarRepository;
    protected $cityRepository;

    public function __construct(
        CalendarRepositoryInterFace $calendarRepository,
        CityRepositoryInterFace $cityRepository,
        DistrictRepositoryInterFace $districtRepository,
        CommuneRepositoryInterFace $communeRepository
    ) {
        $this->calendarRepository = $calendarRepository;
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->communeRepository = $communeRepository;
    }

    public function index()
    {
        $calendars = $this->calendarRepository->listCalendar();
        $cities = $this->cityRepository->getCity();

        return view('frontend.layouts.index', compact('calendars', 'cities'));
    }
}
