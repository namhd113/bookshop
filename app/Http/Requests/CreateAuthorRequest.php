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
            'name' => ['required', \Illuminate\Validation\Rule::unique('authors')->ignore($this->id)],
            'avatar' => 'image|nullable',
            'country' => 'required',
            'wiki_link' => 'required',
            'born' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống'  ,
            'avatar.required' => 'Tuổi không được để trống',
            'country.required' => 'Tác phẩm không được để trống',
            'wiki_link.required' => 'Quốc tịch không được để trống',
            'born.required' => 'Link WIki không được để trống',

        ];
    }
}
