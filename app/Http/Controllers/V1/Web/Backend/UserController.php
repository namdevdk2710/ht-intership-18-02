<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Http\Requests\UserRequest;

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

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.list');
    }

    public function store(UserRequest $request)
    {
        $this->repository->store($request->all());

        return redirect()->route('users.list');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);

        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->repository->find($id);
        $result = $this->repository->update($id, $request->all());
        if ($result) {
            return redirect()->route('users.list')->with('status', 'Successfull!');
        }

        return back()->withErrors('Update failed!');
    }

    public function destroy($id)
    {
        //
    }
}
