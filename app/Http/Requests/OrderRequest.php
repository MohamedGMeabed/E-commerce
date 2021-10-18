<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'shipping_first_name'  => 'required|string',
            'shipping_last_name'  => 'required|string',
            'shipping_email'  => 'required|email',
            'shipping_phone'  => 'required|numeric|min:11',
            'shipping_address'  => 'required|string',
            'shipping_city'  => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'shipping_first_name.required' => 'First Name Field Is Required',
            'shipping_last_name.required' => 'Last Name Field Is Required',
            'shipping_email.required' => 'Email Field Is Required',
            'shipping_phone.required' => 'Phone Field Is Required',
            'shipping_phone' => 'Phone Field Is Not Correct',
            'shipping_address.required' => 'Address Field Is Required',
            'shipping_city.required' => 'City Field Is Required',
        ];
    }
}
