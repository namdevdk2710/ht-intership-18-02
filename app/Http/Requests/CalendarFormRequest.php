<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarFormRequest extends FormRequest
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
            'time' => 'required|date',
            'date' => 'required|date',
            'city' => 'required',
            'district' => 'required',
            'commune' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'time.required' => 'Vui lòng nhập tài khoản !',
            'time.required' => 'sai dinh dang thoi gian !',
            'date.required' => 'Vui lòng nhập tài khoản !',
            'date.required' => 'sai ngay !',
            'city.required' => 'Vui lòng nhập tài khoản !',
            'district.required' => 'Vui lòng nhập tài khoản !',
            'commune.required' => 'Vui lòng nhập tài khoản !',
            'address.required' => 'Vui lòng nhập tài khoản !',
        ];
    }
}
