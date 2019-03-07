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
        $user = $this->model->where('email', $request->email)->first();

        if (! $user) {
            return 'email';
        } elseif ($user->role !== 1) {
            return 'role';
        }
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
            'role' => 1,
        ];
        if (Auth::attempt($data)) {
            return 'password';
        }

        return 'success';
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

    public function userLogin($request)
    {
        $user = $this->model->where('email', $request->email)->first();
        if (! $user) {
            return 'email';
        } elseif ($user->password !=='password') {
            return 'password';
        }
    }

}
