<?php

namespace App\Http\Middleware;

use App\Enums\ErrorCodes;
use App\Exceptions\Authentication\AccessAuthorizedException;
use App\Exceptions\Authentication\AuthorizationEmptyException;
use App\Services\Errors\ErrorServiceInterface;
use Closure;
use JWTAuth;
use Exception;
use Namshi\JOSE\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
//use Tymon\JWTAuth\JWT;

class JWTMiddleware extends BaseMiddleware
{
    protected $errorService;

    public function __construct(ErrorServiceInterface $errorService)
    {
//        parent::__construct();
        $this->errorService = $errorService;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
//            $token = $request->header("USER-KEY");
//            if(!$token) return $this->errorService->getResponse(ErrorCodes::AUT_01);
//
//
//            $haveBearer = explode(" ",$token);
//            if($haveBearer[0] !== "Bearer")  return $this->errorService->getResponse(ErrorCodes::AUT_01);
//
//            // get core token
//            $token_splitted = explode(".",$haveBearer[1]);
//
////            return response()->json([
////                "data" => JWTAuth::decode($haveBearer[1],env("JWT_SECRET")),
////            ]);
//
//
//            return response()->json([
//                "base64_decode_1" => json_decode(base64_decode($token_splitted[0])),
//                "base64_decode_2" => json_decode(base64_decode($token_splitted[1])),
//                "base64_decode_3" => json_decode(base64_decode($token_splitted[2]))
//            ]);
//
//            $user = User::find($credentials->sub);
//            // Now let's put the user in the request class so that you can grab it from there
//            $request->auth = $user;
//            $request->auth->id = Hasher::decode($user->_idd);
//            return $next($request);


            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) throw new AccessAuthorizedException();
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) throw new AccessAuthorizedException();
            else throw new AuthorizationEmptyException();
        }
        return $next($request);
    }
}
