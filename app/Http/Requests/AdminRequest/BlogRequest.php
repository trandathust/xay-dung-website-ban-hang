<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'bail|required|min:2|max:255',
            'image' => 'bail|required',
            'content' => 'bail|required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề bài viết trống',
            'title.max' => 'Tiêu đề bài viết quá dài',
            'title.min' => 'Tiêu đề bài viết quá ngắn',
            'image.required' => 'Chưa chọn ảnh tiêu đề',
            'content.required'=>'Nội dung bài viết trống'
        ];
    }
}
