<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateOrderInputRequest extends FormRequest
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
            "cart_id" => "required|exists:shopping_cart",
            "shipping_id" => "required|numeric|exists:shipping",
            "tax_id" => "required|numeric|exists:tax",
        ];
    }

    public function messages()
    {
        return [
            "cart_id.required" => "Cart ID must be supplied",
            "cart_id.exists" => "Cart ID supplied does not exists",
            "shipping_id.required" => "Shipping ID must be supplied",
            "shipping_id.exists" => "Shipping ID supplied is invalid",
            "shipping_id.numeric" => "Shipping ID must be an integer",
            "tax_id.required" => "Tax ID must be supplied",
            "tax_id.exists" => "Tax ID supplied is invalid",
            "tax_id.numeric" => "Tax ID must be an integer",
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "error" => [
                "status" => 422,
                "message" => $validator->errors()->first()
            ]
        ],422));
    }
}
