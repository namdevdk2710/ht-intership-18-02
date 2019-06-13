<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterFace;
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterReceivedRequest;
use App\Http\Requests\RegisterDonatedRequest;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;

class RequestBloodController extends Controller
{
    protected $calendarRepository;
    protected $userRepository;
    protected $requestBloodRepository;
    protected $bloodGroupRepository;
    protected $informationBloodRepository;
    protected $cityRepository;
    protected $districtRepository;
    protected $communeRepository;

    public function __construct(
        CalendarRepositoryInterFace $calendarRepository,
        UserRepositoryInterFace $userRepository,
        RequestBloodRepositoryInterFace $requestBloodRepository,
        InformationRepositoryInterFace $informationBloodRepository,
        BloodGroupRepositoryInterFace $bloodGroupRepository,
        CityRepositoryInterFace $cityRepository,
        DistrictRepositoryInterFace $districtRepository,
        CommuneRepositoryInterFace $communeRepository
    ) {
        $this->calendarRepository = $calendarRepository;
        $this->userRepository = $userRepository;
        $this->requestBloodRepository = $requestBloodRepository;
        $this->informationRepository = $informationBloodRepository;
        $this->bloodGroupRepository = $bloodGroupRepository;
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->communeRepository = $communeRepository;
    }

    public function getRegisterDonated()
    {
        $calendars = $this->calendarRepository->getFutureCalendar(5);
        $cities = $this->cityRepository->getCity();

        return view('frontend.donatedblood.index', compact('calendars', 'cities'));
    }

    public function postRegisterDonated(RegisterDonatedRequest $request, $calendarId)
    {
        if (Auth::check()) {
            $result = $this->requestBloodRepository->registerDonated($request, $calendarId, Auth::id());
        } else {
            $userId = $this->userRepository->registerDonated($request);

            if ($userId > 0) {
                $this->informationRepository->register($request, $userId);
                $result = $this->requestBloodRepository->registerDonated($request, $calendarId, $userId);
                $this->informationRepository->update($userId, $request);
            } else {
                $result = $this->requestBloodRepository->registerDonated($request, $calendarId, $userId);

            }
            if ($result == false) {
                return redirect()->back()->with('message', 'Bạn đã đăng ký hiến máu');
            } elseif ($result == 'time') {
                return redirect()->back()->with('message', 'Số lần hiến gần nhất chưa đủ 3 tháng');
        }
        }

            return redirect()->back()->with('message', 'Đăng ký thành công.');
    }

    public function getRegisterReceived()
    {
        $cities = $this->cityRepository->getCity();
        $bloodGrooups = $this->bloodGroupRepository->index();
        if (Auth::check()) {
            $user = $this->userRepository->find(Auth::id());

            return view('frontend.receivedblood.index', compact('user', 'bloodGrooups', 'cities'));
        }

        return view('frontend.receivedblood.index', compact('bloodGrooups', 'cities'));
    }

    public function postRegisterReceived(Request $request)
    {
        if (Auth::check()) {
            $result = $this->requestBloodRepository->registerReceived($request, Auth::id());
            return redirect()->back()->with('message', 'Đăng ký thành công.');
        } else {
            $userId = $this->userRepository->registerDonated($request);
            if ($userId > 0) {
                $this->informationRepository->register($request, $userId);
                $result = $this->requestBloodRepository->registerReceived($request, $userId);
            } else {
                return redirect()->back()->with('message', 'Đăng ký thất bại.');
            }
        }
        if ($result == false) {
            return redirect()->back()->with('message', 'Đăng ký thất bại.');
        } else {
            return redirect()->back()->with('message', 'Đăng ký thành công.');
        }
    }

    public function showDistrict(Request $request)
    {
        if ($request->ajax()) {
            $districts = $this->districtRepository->showDistrictInCity($request);

            return response()->json($districts);
        }
    }

    public function showCommune(Request $request)
    {
        if ($request->ajax()) {
            $communes = $this->communeRepository->showCommuneInDistrict($request);

            return response()->json($communes);
        }
    }
}
