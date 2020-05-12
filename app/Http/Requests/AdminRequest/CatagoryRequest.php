<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CatagoryRequest extends FormRequest
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
            'name' => 'bail|required|max:255|min:5'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục sản phẩm trống',
            'name.max' => 'Tên danh mục sản phẩm quá dài',
            'name.min' => 'Tên danh mục sản phẩm quá ngắn',
        ];
    }
}
