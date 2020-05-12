<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'bail|required|max:255|min:5',
            'price' => 'bail|required',
            'detailSP' => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm trống',
            'name.max' => 'Tên sản phẩm quá dài',
            'name.min' => 'Tên sản phẩm quá ngắn',
            'price.required'  => 'Giá sản phẩm trống',
            'detailSP.required' => 'Nội dung miêu tả trống'
        ];
    }
}
