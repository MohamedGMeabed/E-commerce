<?php

namespace App\Http\Requests;

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
            'name'  => 'required|string',
            'description'  => 'required|string',
            'price'  => 'required|numeric',
            'in_stock'  => 'required|integer',
            'price_before'  => 'numeric',
            'start_date' => 'required_if:has_offer,==,on|nullable|date',
            'end_date' => 'required_if:has_offer,==,on|nullable|date|after:start_date',
            'image' => 'required_without:id|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name Field Is Required',
            'description.required' => 'Description Field Is Required',
            'price.required' => 'Price Field Is Required',
            'in_stock.required' => 'Stock Field Is Required',
            'end_date' => 'Date Field Must Be After Start Date',
            'image.required_without' => 'Image Field Is Required',
            'image.image' => 'Image Field Must Be Image Type',
            'image.max' => 'Image Field Max Size 2M',
        ];
    }
}
