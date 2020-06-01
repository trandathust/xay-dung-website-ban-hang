<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class SinginRequest extends FormRequest
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
            'email' => 'bail|required|max:255|unique:users',
            'phone_number' => 'bail|required|unique:users|min:8|max:13',
            'password' => 'bail|required|min:6|max:32',
            'confirm_pasword' => 'bail|required|same:password',
            'address' => 'bail|required|min:5|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên',
            'name.min' => 'Tên quá ngắn',
            'name.max' => 'Tên quá dài',
            'email.required' => 'Chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email quá dài',
            'phone_number.required' => 'Chưa nhập số điện thoại',
            'phone_number.min' => 'Số điện thoại quá ngắn',
            'phone_number.max' => 'Số điện thoại quá dài',
            'phone_number.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn',
            'password.max' => 'Mật khẩu quá dài',
            'confirm_pasword.required' => 'Chưa xác nhận mật khẩu',
            'confirm_pasword.same' => 'Mật khẩu không khớp',
            'address.required' => 'Chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ quá ngắn',
            'address.max' => 'Địa chỉ quá dài',
        ];
    }
}
