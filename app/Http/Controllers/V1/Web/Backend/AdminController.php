<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Http\Requests\LoginRequest;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterFace;
use App\Repositories\V1\WareHouse\WareHouseRepositoryInterFace;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;

class AdminController extends Controller
{
    protected $userRepository;
    protected $requestBloodRepository;
    protected $calendarRepository;
    protected $diaryRepository;
    protected $bloodBagRepository;

    public function __construct(
        UserRepositoryInterFace $userRepository,
        RequestBloodRepositoryInterFace $requestBloodRepository,
        CalendarRepositoryInterFace $calendarRepository,
        DiaryRepositoryInterFace $diaryRepository,
        BloodBagRepositoryInterFace $bloodBagRepository
    ) {
        $this->userRepository = $userRepository;
        $this->requestBloodRepository = $requestBloodRepository;
        $this->calendarRepository = $calendarRepository;
        $this->diaryRepository = $diaryRepository;
        $this->bloodBagRepository = $bloodBagRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getDashboardData();
        $requestBloods = $this->requestBloodRepository->getDashboardData();
        $calendars = $this->calendarRepository->getDashboardData();
        $diaries = $this->diaryRepository->getDashboardData();
        $bloodBags = $this->bloodBagRepository->getDashboardData();

        return view('backend.dashboard.index', compact('users', 'requestBloods', 'calendars', 'diaries', 'bloodBags'));
    }

    public function getLogin()
    {
        if (!Auth::user()) {
            return view('backend.login');
        }

        return redirect()->route('admin.index');
    }

    public function postLogin(LoginRequest $request)
    {
        $rs = $this->userRepository->login($request);

        if ($rs == 'email') {
            return redirect()->back()->with('login-error', 'Email không tồn tại !');
        } elseif ($rs == 'role') {
            return redirect()->back()->with('login-error', 'Không có quyền truy cập trang này !');
        } else {
            return redirect()->back()->with('login-error', 'Password không chính xác !');
        }

        return redirect()->route('admin.index');
    }

    public function logout()
    {
        $this->userRepository->logout();

        return redirect()->back();
    }
}
