<?php

namespace App\Http\Requests;

use App\Rules\EmailValid;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCustomerRequest extends FormRequest
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
            "name"=> "required",
            "email" => ["required","unique:customer",new EmailValid()],
            "password" => "required|min:6",

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
            "name.required"=> "Name is required",
            "email.required" => "Email is required",
            "email.unique" => "Account with email already exists",
            "email.email" => "Email must be a valid email address",
            "password.required" => "Password is required",

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
