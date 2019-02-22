<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập tài khoản !',
            'email.email' => 'Địa chỉ email không hợp lệ !',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập Mật khẩu !',
        ];
    }
}
