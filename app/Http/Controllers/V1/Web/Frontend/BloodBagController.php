<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;
use App\Repositories\V1\User\UserRepositoryInterFace;

class BloodBagController extends Controller
{
    protected $diaryRepository;
    protected $userRepository;

    public function __construct
    (
        DiaryRepositoryInterFace $diaryRepository,
        UserRepositoryInterFace $userRepository
    ) {
        $this->diaryRepository = $diaryRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('frontend.bloodbags.index');
    }

    public function search(Request $request)
    {
        $results = $this->diaryRepository->searchFrontend($request);

        return view('frontend.bloodbags.result_search', compact('results'));
    }
    public function mailResult($id)
    {
        $this->userRepository->mailLabResult($id);

        return redirect()->back()
                        ->with
                            (
                                'success',
                                'Chúng tôi đã gửi kết quả đển mail của bạn.Hãy kiểm tra hộp thư của bạn'
                            );
    }
}
