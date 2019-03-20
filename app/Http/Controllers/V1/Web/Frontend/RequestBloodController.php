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

class RequestBloodController extends Controller
{
    protected $calendarRepository;
    protected $userRepository;
    protected $requestBloodRepository;
    protected $bloodGroupRepository;
    protected $informationBloodRepository;

    public function __construct(
        CalendarRepositoryInterFace $calendarRepository,
        UserRepositoryInterFace $userRepository,
        RequestBloodRepositoryInterFace $requestBloodRepository,
        InformationRepositoryInterFace $informationBloodRepository,
        BloodGroupRepositoryInterFace $bloodGroupRepository
    ) {
        $this->calendarRepository = $calendarRepository;
        $this->userRepository = $userRepository;
        $this->requestBloodRepository = $requestBloodRepository;
        $this->informationRepository = $informationBloodRepository;
        $this->bloodGroupRepository = $bloodGroupRepository;
    }

    public function getRegisterDonated()
    {
        $calendars = $this->calendarRepository->getFutureCalendar(5);

        return view('frontend.donatedblood.index', compact('calendars'));
    }

    public function postRegisterDonated(Request $request, $calendarId)
    {
        if (Auth::check()) {
            $result = $this->requestBloodRepository->registerDonated($request, $calendarId, Auth::id());
        } else {
            $userId = $this->userRepository->registerDonated($request);
            if ($userId > 0) {
                $this->informationRepository->register($request, $userId);
                $result = $this->requestBloodRepository->registerDonated($request, $calendarId, $userId);
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

    public function getRegisterReceived()
    {
        $bloodGrooups = $this->bloodGroupRepository->index();
        if (Auth::check()) {
            $user = $this->userRepository->find(Auth::id());

            return view('frontend.receivedblood.index', compact('user', 'bloodGrooups'));
        }

        return view('frontend.receivedblood.index', compact('bloodGrooups'));
    }

    public function postRegisterReceived(RegisterReceivedRequest $request)
    {
        if (Auth::check()) {
            $this->informationRepository->register($request, Auth::id());
            $result = $this->requestBloodRepository->registerReceived($request, Auth::id());
        } else {
            $userId = $this->userRepository->registerDonated($request);
            if ($userId > 0) {
                $this->informationRepository->register($request, $userId);
                $result = $this->requestBloodRepository->registerReceived($request, $userId);
            } else {
                return redirect()->back()->with('message', 'Đăng ký thất bại.');
            }
        }
        if ($result == false){
            return redirect()->back()->with('message', 'Đăng ký thất bại.');
        } else {
            return redirect()->back()->with('message', 'Đăng ký thành công.');
        }
    }
}
