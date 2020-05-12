<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'bail|required|min:2|max:255|unique:brands',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên thương hiệu trống',
            'name.max' => 'Tên thương hiệu quá dài',
            'name.min' => 'Tên thương quá ngắn',
            'name.unique' => 'Tên thương hiệu trùng lặp'
        ];
    }
}
