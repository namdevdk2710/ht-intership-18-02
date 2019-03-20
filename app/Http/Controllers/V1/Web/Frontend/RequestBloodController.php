<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Calendar\CalendarRepositoryInterFace;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use Illuminate\Support\Facades\Auth;

class RequestBloodController extends Controller
{
    protected $calendarRepository;
    protected $userRepository;
    protected $requestBloodRepository;
    protected $informationBloodRepository;

    public function __construct(
        CalendarRepositoryInterFace $calendarRepository,
        UserRepositoryInterFace $userRepository,
        RequestBloodRepositoryInterFace $requestBloodRepository,
        InformationRepositoryInterFace $informationBloodRepository
    ) {
        $this->calendarRepository = $calendarRepository;
        $this->userRepository = $userRepository;
        $this->requestBloodRepository = $requestBloodRepository;
        $this->informationRepository = $informationBloodRepository;
    }

    public function getRegisterDonated()
    {
        $calendars = $this->calendarRepository->listCalendar(7);

        return view('frontend.requestblood.index', compact('calendars'));
    }

    public function postRegisterDonated(Request $request, $calendarId)
    {
        if (Auth::check()) {
            $this->requestBloodRepository->registerDonated($request, $calendarId, Auth::id());
        } else {
            $userId = $this->userRepository->registerDonated($request, $calendarId);
            if ($userId > 0) {
                $this->informationRepository->register($request, $userId);
                $this->requestBloodRepository->registerDonated($request, $calendarId, $userId);
            } else {
                return redirect()->back();
            }
        }

        return redirect()->route('requestBlood.getRegisterDonated')->with('success', 'Đăng ký thành công.');
    }
}
