<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'bail|required|min:3|max:255',
            'email' => 'required',
            'phone_number' => 'bail|required|unique:suppliers|min:8|max:12',
            'address' => 'bail|max:255',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhà cung cấp trống',
            'name.max' => 'Tên nhà cung cấp quá dài',
            'name.min' => 'Tên nhà cung cấp quá ngắn',
            'email.required' => 'Email nhà cung cấp trống',
            'phone_number.required' => 'Số điện thoại nhà cung cấp trống',
            'phone_number.unique' => 'Số điện thoại bị trùng',
            'phone_number.min' => 'Sai số điện thoại',
            'phone_number.max' => 'Sai số điện thoại',
            'address.max' => 'Địa chỉ quá dài'
        ];
    }
}
