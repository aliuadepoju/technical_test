<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class IsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->expectsJson() && !$request->user('api')) {
            return response()->json([
                'message' => 'Unauthorized!'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
