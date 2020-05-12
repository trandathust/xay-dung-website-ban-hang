<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' =>'bail|required|min:6|max:32',
            'repassword' =>'bail|required|same:password',
            'current_password' =>'bail|required|min:6|max:32',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu trống',
            'repassword.required' => 'Xác nhận mật khẩu trống',
            'repassword.same' => 'Mật khẩu không khớp!',
            'current_password.required' => 'Mật khẩu trống',
        ];
    }
}
