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
            'time.required' => 'Vui lòng chọn thời gian !',
            'time.date' => 'Sai định dạng thời qian !',
            'date.required' => 'Vui lòng chọn ngày !',
            'date.date' => 'Sai định dạng ngày !',
            'city.required' => 'Vui lòng chọn thành phố !',
            'district.required' => 'Vui lòng chọn quận/huyện !',
            'commune.required' => 'Vui lòng chọn xã/phường !',
            'address.required' => 'Vui lòng nhập địa chỉ !',
        ];
    }
}
