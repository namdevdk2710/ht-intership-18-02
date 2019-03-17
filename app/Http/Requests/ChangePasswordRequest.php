<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
            'new_password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu cũ !',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới !',
            'new_password.min' => 'Vui lòng nhập mật khẩu mới nhiều hơn 6 kí tự !',
            'new_password.confirmed' => 'Mật khẩu xác nhận không khớp !',
            'new_password_confirmation.required' => 'Vui lòng mật khẩu xác nhận !',
        ];
    }
}
