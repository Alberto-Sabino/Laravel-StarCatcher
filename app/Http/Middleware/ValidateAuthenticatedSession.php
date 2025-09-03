<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class ValidateAuthenticatedSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $bearerToken = $request->bearerToken();

        if (! $bearerToken || ! Cache::has($bearerToken)) {
            return $this->unauthorizedResponse();
        }

        Session::put('access-token', $bearerToken);

        return $next($request);
    }

    private function unauthorizedResponse()
    {
        return Response::json([
            'message' => 'Usuário não autenticado!'
        ], 401);
    }
}
