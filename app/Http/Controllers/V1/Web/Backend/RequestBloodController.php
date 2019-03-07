<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;

class RequestBloodController extends Controller
{
    protected $repository;

    public function __construct(RequestBloodRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $requestBloods = $this->repository->index();

        return view('backend.requestblood.index', compact('requestBloods'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
