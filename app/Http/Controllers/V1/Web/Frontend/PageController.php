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
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use App\Repositories\V1\Post\PostRepositoryInterFace;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class PageController extends Controller
{
    protected $calendarRepository;
    protected $cityRepository;
    protected $inforRepository;
    protected $postRepository;

    public function __construct(
        CalendarRepositoryInterFace $calendarRepository,
        CityRepositoryInterFace $cityRepository,
        DistrictRepositoryInterFace $districtRepository,
        CommuneRepositoryInterFace $communeRepository,
        UserRepositoryInterFace $userRepository,
        InformationRepositoryInterFace $inforRepository,
        PostRepositoryInterFace $postRepository
    ) {
        $this->calendarRepository = $calendarRepository;
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->communeRepository = $communeRepository;
        $this->userRepository = $userRepository;
        $this->inforRepository = $inforRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {

        $calendars = $this->calendarRepository->getFutureCalendar(5);
        $cities = $this->cityRepository->getCity();
        $infor = $this->inforRepository->getInfor();
        $posts = $this->postRepository->index();

        return view('frontend.layouts.index', compact('calendars', 'cities', 'infor', 'posts')) ;
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

    public function postRegister(RegisterRequest $request)
    {
        $this->userRepository->register($request->all());

        return redirect()->route('home');
    }

    public function logout()
    {
            $this->userRepository->logout();

            return redirect()->back();
    }
}
