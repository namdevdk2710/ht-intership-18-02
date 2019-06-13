<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;

class BloodBagController extends Controller
{
    protected $diaryRepository;
    protected $userRepository;
    protected $cityRepository;

    public function __construct(
        DiaryRepositoryInterFace $diaryRepository,
        UserRepositoryInterFace $userRepository,
        CityRepositoryInterFace $cityRepository
    ) {
        $this->diaryRepository = $diaryRepository;
        $this->userRepository = $userRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->getCity();

        return view('frontend.bloodbags.index', compact('cities'));
    }

    public function search(Request $request)
    {
        $cities = $this->cityRepository->getCity();
        $results = $this->diaryRepository->searchFrontend($request);

        return view('frontend.bloodbags.result_search', compact('results', 'cities'));
    }
    public function mailResult($id)
    {
        $this->userRepository->mailLabResult($id);

        return redirect()->back()
            ->with('success', 'Chúng tôi đã gửi kết quả đển mail của bạn. Hãy kiểm tra hộp thư của bạn');
    }
}
