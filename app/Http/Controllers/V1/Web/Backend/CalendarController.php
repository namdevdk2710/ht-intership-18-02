<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;

class CalendarController extends Controller
{
    protected $calendarRepository, $cityRepository;

    public function __construct(CalendarRepositoryInterFace $calendarRepository, CityRepositoryInterFace $cityRepository, DistrictRepositoryInterFace $districtRepository, CommuneRepositoryInterFace $communeRepository)
    {
        $this->calendarRepository = $calendarRepository;
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->communeRepository = $communeRepository;
    }

    public function listCalendar()
    {
        $calendars = $this->calendarRepository->listCalendar();
        $cities = $this->cityRepository->getCity();

        return view('backend.calendar.list_calendar', compact('calendars','cities'));
    }

    public function postAddCalendar(Request $request)
    {
        $this->calendarRepository->store($request->all());

        return redirect()->route('calendar.listCalendar');
    }

    public function showDistrictInCity(Request $request)
    {
        if ($request->ajax()) {
            $districts = $this->districtRepository->showDistrictInCity($request);

            return response()->json($districts);
        }
    }

    public function showCommuneInDistrict(Request $request)
    {
        if ($request->ajax()) {
            $communes = $this->communeRepository->showCommuneInDistrict($request);

            return response()->json($communes);
        }
    }
}
