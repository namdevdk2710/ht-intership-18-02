<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\User\UserRepositoryInterFace;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->index();
        return view('backend.users.index',compact('users'));
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
