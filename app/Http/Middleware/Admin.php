<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(
            Auth::user()->role !== 'Admin',
            Response::HTTP_UNAUTHORIZED
        );

        return $next($request);
    }
}
