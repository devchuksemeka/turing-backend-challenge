<?php

namespace App\Services\Errors;

interface ErrorServiceInterface{
    public function getResponse(string $error_code);
}