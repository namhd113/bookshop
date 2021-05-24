<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorRequest extends FormRequest
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
            'name'=>'required',
            'age' => 'required',
            'status' => 'required',
            'country' => 'required',
            'desc' => 'required',
            'author_image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống'  ,
            'age.required' => 'Tuổi không được để trống',
            'status.required' => 'Tác phẩm không được để trống',
            'country.required' => 'Quốc tịch không được để trống',
            'desc.required' => 'Link WIki không được để trống',
            'author_image.required' => 'Ảnh không được để trống'
        ];
    }
}
