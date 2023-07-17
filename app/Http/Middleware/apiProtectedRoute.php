<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class apiProtectedRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch(\Exception $e){
            if($e instanceof TokenInvalidException)
                return response()->json(['status' => 'Token is Invalid']);
            if($e instanceof TokenExpiredException)
                return response()->json(['status' => 'Token is Expired']);
            return response()->json(['status' => 'Authorization Token not found']);
        }

        if (! ($user && in_array($user->profile, $roles))) {
            return response()->json(['status' => 'Sem autorização']);
        }

        return $next($request);
    }
}
