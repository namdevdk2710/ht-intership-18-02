<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userRepository;
    protected $groupReponsitoty;
    protected $inforReponsitoty;
    protected $cityRepository;

    public function __construct(
        UserRepositoryInterFace $userRepository,
        BloodGroupRepositoryInterFace $groupRepository,
        InformationRepositoryInterFace $inforRepository,
        CityRepositoryInterFace $cityRepository,
        DistrictRepositoryInterFace $districtRepository,
        CommuneRepositoryInterFace $communeRepository
    ) {
        $this->userRepository = $userRepository;
        $this->groupReponsitoty = $groupRepository;
        $this->inforReponsitoty = $inforRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        $cities = $this->cityRepository->getCity();
        $bloodGroup = $this->groupReponsitoty->getBlood();

        return view('backend.users.index', compact('users', 'cities', 'bloodGroup'));
    }

    public function create()
    {
        return view('backend.users.list');
    }

    public function store(UserRequest $request)
    {
        $this->userRepository->store($request->only('username', 'email', 'password', 'role'));
        $this->inforReponsitoty->store($request->only('user_id', 'name', 'gender', 'dob',
        'cmnd', 'commune', 'address', 'phone', 'blood_id'));

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

    public function showDistrictInCity(Request $request)
    {
        if ($request->ajax()) {
            $districts = $this->districtRepository->showDistrictInCity($request);

            return response()->json($districts);
        }
    }

    public function showCommuneInDistrict(Request $request)
    {
        if ($request->ajax()) {
            $communes = $this->communeRepository->showCommuneInDistrict($request);

            return response()->json($communes);
        }
    }
}
