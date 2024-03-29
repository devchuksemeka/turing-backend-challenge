<?php

namespace App\Http\Requests;

use App\Rules\ValidCreditCard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerCreditCardRequest extends FormRequest
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
            "credit_card" => ["required",new ValidCreditCard()]
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
            "credit_card.required" => "Credit Card is required",
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
