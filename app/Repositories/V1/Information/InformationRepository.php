<?php

namespace App\Repositories\V1\Information;

use App\Repositories\BaseRepository;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;

class InformationRepository extends BaseRepository implements InformationRepositoryInterface
{
    public function getModel()
    {
        return Information::class;
    }

    public function store($data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'blood_id' => $data['blood_id'],
            'commune_id' => $data['commune'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'cmnd' => $data['cmnd'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);
    }

    public function getInfor()
    {
        $infor = $this->model->with('bloodGroup')->where('user_id', Auth::id())->first();

        return $infor;
    }

    public function register($request, $userId)
    {
        $data = [
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'cmnd' => $request->input('cmnd'),
            'phone' => $request->input('phone'),
            'user_id' => $userId,
            'commune_id' => $request->input('communes'),
            'address' => $request->input('address'),
            'dob' => $request->input('dob'),
        ];
        $bloodId = $request->input('bloodgroup');
        if (isset($bloodId)) {
            $data['blood_id'] = $bloodId;
        }

        return $this->model->create($data);
    }

    public function updateBloodGroup($request, $userId)
    {
        $userInfo = $this->model->where('user_id', $userId)->first();
        $userInfo->blood_id = $request->input('blood_group');

        return $userInfo->save();
    }
}
