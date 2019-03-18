<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;

class DiaryController extends Controller
{

    protected $repository;

    public function __construct(DiaryRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $diaries = $this->repository->index();

        return view('backend.diary.index', compact('diaries'));
    }

    public function search(Request $request)
    {
        $diaries = $this->repository->search($request);

        return view('backend.diary.index', compact('diaries'));
    }
}
