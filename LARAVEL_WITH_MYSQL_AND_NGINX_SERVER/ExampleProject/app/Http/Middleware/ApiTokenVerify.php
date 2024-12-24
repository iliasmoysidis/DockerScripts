<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponseHelper as ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bearerToken = $request->bearerToken();
        if (empty($bearerToken))
            return ApiResponse::Unauthorized()
                ->code('missing_bearer_token')
                ->message("Missing Authentication Bearer Token from headers")
                ->send();

        $token = PersonalAccessToken::findToken($bearerToken);

        if (empty($token))
            return ApiResponse::Unauthorized()
                ->code('invalid_token')
                ->message('Bearer Token is invalid or expired')
                ->send();

        $request->setUserResolver(function () use ($token) {
            return $token->tokenable;
        });

        Auth::setUser($token->tokenable);

        return $next($request);
    }
}
