<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập tài khoản !',
            'email.email' => 'Địa chỉ email không hợp lệ !',
            'email.unique' => 'Email đã tồn tại ! ',
            'password.required' => 'Vui lòng nhập Mật khẩu !',
            'password.confirmed' => 'Nhập lại mật khẩu không đúng !',
        ];
    }
}
