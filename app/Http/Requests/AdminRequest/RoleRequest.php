<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'display_name' => 'bail|required|max:255|min:5'
        ];
    }
    public function messages()
    {
        return [
            'display_name.required' => 'Tên vai trò trống',
            'display_name.max' => 'Tên vai trò quá dài',
            'display_name.min' => 'Tên vai trò quá ngắn',
        ];
    }
}
