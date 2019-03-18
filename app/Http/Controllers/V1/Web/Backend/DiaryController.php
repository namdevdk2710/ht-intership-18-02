<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
    public function index()
    {
        return view('backend.diary.index');
    }
}
