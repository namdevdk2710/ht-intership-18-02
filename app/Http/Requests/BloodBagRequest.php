<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodBagRequest extends FormRequest
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
            'unit' => 'required|numeric',
            'request_blood_id' => 'required|numeric',
            'note' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'unit.required' => 'Yêu cầu nhập lượng máu !',
            'unit.numeric' => 'Lượng máu nhập vào là số nguyên !',
            'request_blood_id.required' => 'Yêu cầu nhập mã người dùng trước khi tạo !',
            'request_blood_id.numeric' => 'mã người dùng là số nguyên là số nguyên !',
        ];
    }
}
