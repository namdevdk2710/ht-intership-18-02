<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;

class DiaryController extends Controller
{
    protected $diaryRepository;

    public function __construct(DiaryRepositoryInterFace $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    public function getDiary()
    {
        $this->diaryRepository->index();

        return view('frontend.diaries.index');
    }

    public function postDiary(Request $request)
    {
        $results = $this->diaryRepository->searchDiary($request);

        return view('frontend.diaries.result', compact('results'));
    }
}
