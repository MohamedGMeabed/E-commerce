<?php

namespace App\Http\Requests;

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
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required_without:id|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title Field Is Required',
            'description.required' => 'Description Field Is Required',
            'image.required_without' => 'Image Field Is Required',
            'image.image' => 'Image Field Must Be Image Type',
            'image.max' => 'Image Field Max Size 2M',
        ];
        
    }
}
