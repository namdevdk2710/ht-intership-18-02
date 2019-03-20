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
        ];
        $blood_id = $request->input('bloodgroup');
        if (isset($blood_id)) {
            $data['blood_id'] = $blood_id;
        }
        $dob = $request->input('dob');
        if (isset($dob)) {
            $data['dbo'] = $dob;
        }

        return $this->model->create($data);
    }
}
