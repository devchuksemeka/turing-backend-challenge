<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductReviewRequest extends FormRequest
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
            "product_id" => "required|exists:product|numeric",
            "review" => "required|string",
            "rating" => "required|numeric",
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
            "product_id.required" => "Product ID must be supplied",
            "product_id.exists" => "Product ID does not exists",
            "product_id.numeric" => "Product ID must be an Integer",
            "review.required" => "Product Review content must be supplied",
            "review.string" => "Product Review must be a string value",
            "rating.required" => "Product Rating must be supplied",
            "rating.numeric" => "Product Rating must be a numeric value",
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
