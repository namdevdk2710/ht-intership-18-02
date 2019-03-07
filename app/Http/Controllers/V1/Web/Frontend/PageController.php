<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;
use Illuminate\Support\Facades\Auth;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Http\Requests\LoginRequest;

class PageController extends Controller
{
    protected $calendarRepository;
    protected $cityRepository;

    public function __construct(
        CalendarRepositoryInterFace $calendarRepository,
        CityRepositoryInterFace $cityRepository,
        DistrictRepositoryInterFace $districtRepository,
        CommuneRepositoryInterFace $communeRepository,
        UserRepositoryInterFace $userRepository
    ) {
        $this->calendarRepository = $calendarRepository;
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->communeRepository = $communeRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $calendars = $this->calendarRepository->listCalendar();
        $cities = $this->cityRepository->getCity();

        return view('frontend.layouts.index', compact('calendars', 'cities')) ;
    }

    public function postLogin(LoginRequest $request)
    {
        $rs = $this->userRepository->userLogin($request);

        if ($rs == 'email') {
            return redirect()->back()->with('login-error', 'Email không tồn tại !');
        } elseif ($rs == 'password') {
            return redirect()->back()->with('login-error', 'Password không chính xác !');
        }

        return redirect()->route('home');
    }
}
