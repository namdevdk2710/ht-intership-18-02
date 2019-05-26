<?php

namespace App\Repositories\V1\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\LabResult;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function index()
    {
        return $this->model->paginate(5);
    }

    public function login($request)
    {
        $user = $this->model->where('email', $request->email)->first();

        if (! $user) {
            return 'email';
        } elseif ($user->role == 0) {
            return 'role';
        }
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            return 'password';
        }

        return 'success';
    }

    public function store($data)
    {
        return $this->model->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
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
// ---------------------------Frontend-------------------------------------------------------------
    public function userLogin($request)
    {
        $user = $this->model->where('email', $request->email)->first();
        if (! $user) {
            return 'email';
        }
        if (! Hash::check($request->password, $user['password'])) {
            return 'password';
        }
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            return 1;
        }
        return 'success';
    }

    public function register($data)
    {
        return $this->model->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 0,
        ]);
    }

    public function changeAdminPassword($request)
    {
        $user = $this->model->find(Auth::id());
        if (! Hash::check($request->input('current_password'), $user->password)) {
            return 'password';
        } else {
            $user->password = bcrypt($request->input('new_password'));
            $user->save();

            return 'success';
        }
    }

    public function getDashboardData()
    {
        return $this->model->all();
    }

    public function registerDonated($request)
    {
        if (!$this->model->where('email', $request->email)->first()) {
            $this->model->create([
                'username' => explode('@', $request->email)[0],
                'email' => $request->email,
                'password' => bcrypt('123456'),
                'role' => 2,
            ]);

            return $this->model->orderBy('created_at', 'desc')->first()->id;
        } else {
            return false;
        }
    }

    public function mailLabResult($id)
    {
        $data = $this->model->find($id);

        return Mail::to($data['email'])->send(new LabResult($data));
    }
}
