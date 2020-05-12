<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     *htt
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|max:255|min:5',
            'config_value' => 'bail|required|min:5',
            'config_key' => 'bail|unique:settings|required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bỏ trống',
            'name.max' => 'Tên quá dài',
            'name.min' => 'Tên quá ngắn',
            'config_value.required' => 'Chưa nhập link',
            'config_value.min' => 'Sai định dạng',
            'config_key.required' => 'Chưa có icon',
            'config_key.unique' =>'Icon đã tồn tại',    
        ];
    }
}
