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
}
