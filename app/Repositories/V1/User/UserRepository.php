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
    public function store($data){
        $user= new User;
        $user->username= $data->username;
        $user->email= $data->email;
        $user->password= $data->password;
        $user->role= $data->role;
        $user->save();
    }
}
