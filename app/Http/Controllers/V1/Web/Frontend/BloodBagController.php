<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;

class BloodBagController extends Controller
{
    protected $diaryRepository;

    public function __construct(DiaryRepositoryInterFace $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
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
}
