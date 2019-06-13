<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;

class DiaryController extends Controller
{
    protected $diaryRepository;
    protected $cityRepository;

    public function __construct(DiaryRepositoryInterFace $diaryRepository, CityRepositoryInterFace $cityRepository)
    {
        $this->diaryRepository = $diaryRepository;
        $this->cityRepository = $cityRepository;
    }

    public function getDiary()
    {
        $cities = $this->cityRepository->getCity();
        $this->diaryRepository->index();

        return view('frontend.diaries.index', compact('cities'));
    }

    public function postDiary(Request $request)
    {
        $cities = $this->cityRepository->getCity();
        $results = $this->diaryRepository->searchDiary($request);

        return view('frontend.diaries.result', compact('results', 'cities'));
    }
}
