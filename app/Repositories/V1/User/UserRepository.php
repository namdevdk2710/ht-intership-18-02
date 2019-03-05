<?php

namespace App\Repositories\V1\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function login($request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return 0;
        }
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            return 2;
        }

        return 1;
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $user= $this->model->find($id);
        $user->fill($data);
        $user->save();

        return $user;
    }

    public function logout()
    {
        return Auth::logout();
    }
}
