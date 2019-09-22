<?php

namespace App\Exceptions;

use App\Enums\ErrorCodes;
use App\Exceptions\Authentication\AccessAuthorizedException;
use App\Exceptions\Authentication\AuthorizationEmptyException;
use App\Exceptions\Category\CategoryNotFoundException;
use App\Exceptions\Department\DepartmentIdNotNumberException;
use App\Exceptions\Department\DepartmentNotFoundException;
use App\Exceptions\Users\EmailDoesNotExistException;
use App\Exceptions\Users\InvalidEmailException;
use App\Exceptions\Users\InvalidEmailOrPasswordException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof AccessAuthorizedException)
            return $this->responseResult(["code"=> ErrorCodes::AUT_02, "message"=> "Access Unauthorized"]);
        elseif ($exception instanceof AuthorizationEmptyException)
            return $this->responseResult(["code"=> ErrorCodes::AUT_01, "message"=> "Authorization code is empty"]);

        elseif ($exception instanceof InvalidEmailOrPasswordException)
            return $this->responseResult(["code"=> ErrorCodes::USR_01, "message"=> "Invalid Email Or Password","field"=>"email_or_password"]);

        elseif ($exception instanceof EmailDoesNotExistException)
            return $this->responseResult(["code"=> ErrorCodes::USR_05, "message"=> "The email does not exist","field"=>"email"]);

        elseif ($exception instanceof InvalidEmailException)
            return $this->responseResult(["code"=> ErrorCodes::USR_03, "message"=> "The email is invalid","field"=>"email"]);

        elseif ($exception instanceof DepartmentIdNotNumberException)
            return $this->responseResult(["code"=> ErrorCodes::DEP_01, "message"=> "The ID is not a number", "field"=> "department_id"]);
        elseif ($exception instanceof DepartmentNotFoundException)
            return $this->responseResult(["code"=> ErrorCodes::DEP_02, "message"=> "Don'exist department with this ID", "field"=> "department_id"]);
        elseif ($exception instanceof CategoryNotFoundException)
            return $this->responseResult([
                "code"=> ErrorCodes::CAT_01,
                "message"=> "Don't exist category with this ID",
                "field"=> "category_id"
            ]);

        return parent::render($request, $exception);

    }

    protected function responseResult(array $attributes){
        return response()->json([
            "error" => [
                "status" => 400,
                "code" => Arr::get($attributes,"code","SYS_01"),
                "message" => Arr::get($attributes,"message","Failed"),
                "field" => Arr::get($attributes,"field","application_error"),
            ]
        ],Arr::get($attributes,"status",400));
    }
}
