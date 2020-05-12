<?php

namespace App\Http\Requests\AdminRequest;

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
            'email'=>'bail|required|email',
            'password' =>'bail|required|min:6|max:32'
        ];
    }


    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.min'=> 'Mật khẩu quá ngắn!',
            'password.max' => 'Mật khẩu quá dài!'
        ];
    }
}
