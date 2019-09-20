<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerProfileRequest extends FormRequest
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
            "email" => "required|email|unique:customer,email,".Auth::user()->customer_id.",customer_id",
            "name" => "required",
            "day_phone" => "required",
            "eve_phone" => "required",
            "mob_phone" => "required"
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
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email",
            "name.required" => "Name is required",
            "day_phone.required" => "Day Phone is required",
            "eve_phone.required" => "Eve Phone is required",
            "mob_phone.required" => "Mobile is required"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "error" => [
                "status" => 422,
                "message" => $validator->errors()->first(),
            ]
        ],422));
    }
}
