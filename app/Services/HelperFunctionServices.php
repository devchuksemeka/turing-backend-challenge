<?php


namespace App\Services;


use Illuminate\Support\Arr;

class HelperFunctionServices
{
    public function responseResult(array $attributes){
        return response()->json([
            "error" => $attributes
        ],Arr::get($attributes,"status",400));
    }

}
