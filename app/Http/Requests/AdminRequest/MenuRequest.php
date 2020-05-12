<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'url' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên menu trống',
            'name.max' => 'Tên menu quá dài',
            'name.min' => 'Tên menu quá ngắn',
            'url.required' => 'Chưa có đường link'
        ];
    }
}
