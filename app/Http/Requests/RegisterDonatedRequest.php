<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDonatedRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Yêu cầu nhập email !',
            'email.email' => 'Email không đúng định dạng !',
            'email.unique' => 'Email đã tồn tại !',
        ];
    }
}
