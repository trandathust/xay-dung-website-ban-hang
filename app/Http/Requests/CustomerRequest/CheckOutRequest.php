<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'name' => 'bail|required|min:2|max:255',
            'phone_number' => 'bail|required|min:8|max:12',
            'address' =>'bail|required|min:5|max:255',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên quá ngắn',
            'name.max' => 'Tên quá dài',
            'phone_number.required' => 'Bạn chưa nhập số điện thoại',
            'phone_number.min' => 'Số điện thoại quá ngắn',
            'phone_number.max' => 'Số điện thoại quá dài',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ quá ngắn',
            'address.max' => 'Địa chỉ quá dài'
        ];
    }
}
