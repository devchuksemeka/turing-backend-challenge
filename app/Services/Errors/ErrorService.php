<?php

namespace App\Services\Errors;

use App\Enums\ErrorCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ErrorService implements ErrorServiceInterface{

    public function getErrorResource(array $attributes)
    {
        return response()->json([
            "error" => [
                "status" => 400,
                "code" => Arr::get($attributes, "code", "SYS_01"),
                "message" => Arr::get($attributes, "message", "Failed"),
                "field" => Arr::get($attributes, "field", "application_error"),
            ]
        ], Arr::get($attributes, "status", 400));
    }

    public function getResponse(string $error_code) : JsonResponse
    {
        if($error_code == ErrorCodes::DEP_01) return $this->getDep01Error();
        elseif($error_code == ErrorCodes::DEP_02) return $this->getDep02Error();
        elseif($error_code == ErrorCodes::CAT_01) return $this->getCat01Error();
        elseif($error_code == ErrorCodes::ATTR_01) return $this->getAttr01Error();
        elseif($error_code == ErrorCodes::PRO_01) return $this->getPro01Error();
        elseif($error_code == ErrorCodes::AUT_01) return $this->getAuth01Error();
        elseif($error_code == ErrorCodes::AUT_02) return $this->getAuth02Error();
        elseif($error_code == ErrorCodes::USR_01) return $this->getUsr01Error();
        elseif($error_code == ErrorCodes::USR_05) return $this->getUsr05Error();

    }

    protected function getAuth01Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 403,
                "code"=> ErrorCodes::AUT_01,
                "message"=> "Authorization code is empty.",
                "field"=> "authorization_token"
            ]
        ],403);
    }

    protected function getAuth02Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 403,
                "code"=> ErrorCodes::AUT_02,
                "message"=> "Access Unauthorized.",
                "field"=> "token_unauthorized"
            ]
        ],403);
    }

    // get dep_01 error code
    protected function getDep01Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=>  ErrorCodes::DEP_01,
                "message"=> "The ID is not a number.",
                "field"=> "department_id"
            ]
        ],400);
    }

    // get dep_02 error code
    protected function getDep02Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=> ErrorCodes::DEP_02,
                "message"=> "Don'exist department with this ID.",
                "field"=> "department_id"
            ]
        ],400);
    }

    protected function getCat01Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=>  ErrorCodes::CAT_01,
                "message"=> "Don't exist category with this ID.",
                "field"=> "category_id"
            ]
        ],400);
    }

    protected function getAttr01Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=>  ErrorCodes::ATTR_01,
                "message"=> "Don't exist attribute with this ID.",
                "field"=> "attribute_id"
            ]
        ],400);
    }

    protected function getPro01Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=> ErrorCodes::PRO_01,
                "message"=> "Don't exist product with this ID.",
                "field"=> "product_id"
            ]
        ],400);
    }

    protected function getUsr01Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=> ErrorCodes::USR_01,
                "message"=> "Email or Password is invalid.",
                "field"=> "email_or_password"
            ]
        ],400);
    }

    protected function getUsr05Error() : JsonResponse{
        return response()->json([
            "error" => [
                "status" => 400,
                "code"=> ErrorCodes::USR_05,
                "message"=> "The email doesn't exist.",
                "field"=> "email"
            ]
        ],400);
    }

}
