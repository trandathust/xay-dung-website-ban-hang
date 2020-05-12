<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest2 extends FormRequest
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
            'phone_number' => 'required|min:9|max:12',
            'email' => 'required',
            'footer' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'phone_number.required' => 'Số điện thoại bỏ trống',
            'phone_number.max' => 'Số điện thoại quá dài',
            'phone_number.min' => 'Số điện thoại quá ngắn',
            'email.required' => 'Chưa nhập email',
            'footer.required' => 'Chưa nhập chân trang',
        ];
    }
}
