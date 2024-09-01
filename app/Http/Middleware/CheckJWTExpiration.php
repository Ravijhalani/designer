<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTFactory;
class CheckJWTExpiration extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        // $user = auth()->user();
        // $userData = new \StdClass();
        // $userData->user_id = (string) $user->id;

        // $payload = JWTFactory::sub($user->id)->data($userData)->make();
        // $token = JWTAuth::encode($payload);
        // $user->jwt_token = $token->get();
        // $user->save();

        return $next($request);
    }
}
