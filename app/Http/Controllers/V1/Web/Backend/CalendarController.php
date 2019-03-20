<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarFormRequest;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;

class CalendarController extends Controller
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
        $calendars = $this->calendarRepository->listCalendar(5);
        $cities = $this->cityRepository->getCity();

        return view('backend.calendar.index', compact('calendars', 'cities'));
    }

    public function postAddCalendar(CalendarFormRequest $request)
    {
        $this->calendarRepository->store($request->all());

        return redirect()->back()->with('success', 'Thêm thành công');
    }

    public function delete($id)
    {
        $this->calendarRepository->destroy($id);

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function update(CalendarFormRequest $request, $id)
    {
        $this->calendarRepository->update($id, $request);

        return redirect()->back()->with('success', 'Cập nhập thành công');
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

    public function show($id)
    {
        $calendar = $this->calendarRepository->find($id);

        return view('backend.calendar.list_user_of_calendar', compact('calendar'));
    }
}
