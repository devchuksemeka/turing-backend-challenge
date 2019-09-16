<?php

namespace App\Services;

class DefaultErrorService implements ErrorServiceInterface{
    public function getResponse()
    {
        return [
            "error" => [
                "status" => 400,
                "message" => "An Error Occurred, please try again",
                "code" => "DEFAULT_00",
                "field" => "unknown",
            ]
        ];
    }
}