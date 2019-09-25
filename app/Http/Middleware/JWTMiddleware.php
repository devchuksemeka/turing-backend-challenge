<?php

namespace App\Http\Middleware;

use App\Enums\ErrorCodes;
use App\Exceptions\Authentication\AccessAuthorizedException;
use App\Exceptions\Authentication\AuthorizationEmptyException;
use App\Services\Errors\ErrorServiceInterface;
use Closure;
use JWTAuth;
use Exception;
use Namshi\JOSE\SimpleJWS;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws AccessAuthorizedException
     * @throws AuthorizationEmptyException
     */
    public function handle($request, Closure $next)
    {
        try {
//            $token = $request->header("USER-KEY");
//            if(!$token) throw new AuthorizationEmptyException();
//
//            $haveBearer = explode(" ",$token);
//
//            if($haveBearer[0] !== "Bearer")  throw new AuthorizationEmptyException();
////            // get core token
////            $user = JWTAuth::toUser($haveBearer[1]);
//
//            $secret = config('jwt.secret');
//            $jws = SimpleJWS::load($haveBearer[1]);
//
//            if (!$jws->isValid($secret)) throw new AccessAuthorizedException();
//            $payload = $jws->getPayload();
////            return response()->json([
////                $payload
////            ]);
///
            $user = JWTAuth::parseToken()->authenticate();

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) throw new AccessAuthorizedException();
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) throw new AccessAuthorizedException();
            else throw new AuthorizationEmptyException();
        }
        return $next($request);
    }
}
