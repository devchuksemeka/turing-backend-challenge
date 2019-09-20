<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "address_1" => "required",
            "address_2" => "required",
            "city" => "required",
            "region" => "required",
            "postal_code" => "required",
            "shipping_region_id" => "required|numeric",
        
        ];
    }

       /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
     
        return [
            "address_1.required" => "Address 1 is required",
            "address_2.required" => "Address 2 is required",
            "city.required" => "City is required",
            "region.required" => "Region is required",
            "postal_code.required" => "Postal Code is required",
            "shipping_region_id.required" => "Shipping Region is required",
            "shipping_region_id.numeric" => "Shipping Region supplied must be numeric",
        ];
    }


    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
            "error" => [
                "status" => 422,
                "message" => $validator->errors()->first(),
            ]
        ],422));
    }
}
