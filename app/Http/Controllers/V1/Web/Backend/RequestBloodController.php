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
        //
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

    public function donated()
    {
        $requestBloods = $this->repository->donated();

        return view('backend.requestblood.donated', compact('requestBloods'));
    }

    public function received()
    {
        $requestBloods = $this->repository->received();

        return view('backend.requestblood.received', compact('requestBloods'));
    }
    
    public function donatedConfirm($id)
    {
        $this->repository->donatedConfirm($id);

        return redirect()->back();
    }
}
