<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Http\Requests\LoginRequest;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('backend.index');
    }

    public function getLogin()
    {
        if (!Auth::user()) {
            return view('backend.login');
        }

        return redirect()->route('admin.index');
    }

    public function postLogin(LoginRequest $request)
    {
        $rs = $this->repository->login($request);

        if ($rs == 0) {
            return redirect()->back()->with('login-error', 'Email không tồn tại !');
        } elseif ($rs == 1) {
            return redirect()->back()->with('login-error', 'Password không chính xác !');
        }

        return redirect()->back();
    }

    public function logout()
    {
        $this->repository->logout();

        return redirect()->back();
    }
}
