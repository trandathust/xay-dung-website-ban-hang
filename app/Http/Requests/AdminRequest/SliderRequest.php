<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name' => 'bail|required|min:5|max:255',
            'image_path' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên slider trống',
            'name.max' => 'Tên slider quá dài',
            'name.min' => 'Tên slider quá ngắn',
            'image_path.required' => 'Chưa chọn ảnh slider',
            'description.required' => 'Mô tả slider trống',
        ];
    }
}
