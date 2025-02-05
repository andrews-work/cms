<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Employee
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        if (Auth::check() && Auth::user()->hasRole('employee')) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
