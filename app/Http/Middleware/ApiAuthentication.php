<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class ApiAuthentication
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        $user = User::query()->where('api_token', $token)->first();
        if ($user) {
            return $next($request);
        }
        return response([
            'message' => 'Unauthenticated'
        ], 403);
    }
}
