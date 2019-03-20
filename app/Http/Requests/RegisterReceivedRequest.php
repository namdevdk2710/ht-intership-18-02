<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterReceivedRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'cmnd' => 'required|numeric',
            'phone' => 'required|numeric',
            'bloodgroup' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập E-Mail !',
            'email.email' => 'Địa chỉ email không hợp lệ !',
            'name.required' => 'Vui lòng nhập họ tên !',
            'cmnd.required' => 'Vui lòng nhập cmnd !',
            'cmnd.numeric' => 'Nhập đúng định dạng cmnd !',
            'phone.required' => 'Vui lòng nhập số điện thoại !',
            'phone.numeric' => 'Nhập đúng định dạng số điện thoại !',
            'bloodgroup.required' => 'Vui lòng chọn nhóm máu !',
            'gender.required' => 'Vui lòng chọn giới tính !',
            'dob.required' => 'Vui lòng nhập ngày sinh !',
            'dob.date' => 'Nhập đúng định dạng ngày sinh !',
        ];
    }
}
