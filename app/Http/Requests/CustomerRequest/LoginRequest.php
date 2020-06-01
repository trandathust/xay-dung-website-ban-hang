<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email_login' => 'bail|required|',
            'password_login' => 'bail|required',
        ];
    }
    public function messages()
    {
        return [
            'email_login.required' => 'Bạn chưa nhập email!',
            'password_login.required' => 'Bạn chưa nhập mật khẩu!',
        ];
    }
}
