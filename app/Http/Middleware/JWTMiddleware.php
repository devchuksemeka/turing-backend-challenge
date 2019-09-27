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
            $token = $request->header("USER-KEY");
            if(!$token) throw new AuthorizationEmptyException();

            $request->headers->add(["Authorization"=>$token]);
            $user = JWTAuth::parseToken()->authenticate();

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) throw new AccessAuthorizedException();
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) throw new AccessAuthorizedException();
            else throw new AuthorizationEmptyException();
        }
        return $next($request);
    }
}
