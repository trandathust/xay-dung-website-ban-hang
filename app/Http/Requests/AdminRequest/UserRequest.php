<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' =>'bail|required|min:2|max:255',
            'email'=>'bail|required|email',
            'password' =>'bail|required|min:6|max:32',
            'repassword' =>'bail|required|same:password',
            'address' => 'bail|required|max:255',
            'phone_number'=>'bail|required|min:5|max:15',
            'sex' => 'bail|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên quá ngắn',
            'name.max' => 'Tên quá dài',
            'email.required'  => 'Bạn chưa nhập email',
            'password.required' => 'Mật khẩu trống',
            'repassword.required' => 'Xác nhận mật khẩu trống',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ quá ngắn',
            'address.max' => 'Địa chỉ quá dài',
            'phone_number.required' => 'Bạn chưa nhập số điện thoại!',
            'phone_number.min' => 'Sai số điện thoại!',
            'phone_number.max' => 'Sai số điện thoại!',
            'repassword.same' => 'Mật khẩu không khớp!'
        ];
    }
}
