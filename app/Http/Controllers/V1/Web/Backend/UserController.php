<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterFace;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userRepository, $groupReponsitoty, $inforReponsitoty;

    public function __construct(UserRepositoryInterFace $userRepository,
                        BloodGroupRepositoryInterFace $groupRepository,
                        InformationRepositoryInterFace $inforRepository )
    {
        $this->userRepository = $userRepository;
        $this->groupReponsitoty = $groupRepository;
        $this->inforReponsitoty = $inforRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.list');
    }

    public function store(UserRequest $request)
    {
        $this->userRepository->store($request->all());

        return redirect()->route('users.list');
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
