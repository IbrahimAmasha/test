<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles): Response
    {
        // Check if user is authenticated and has a required role
        if (!Auth::check() || !in_array(Auth::user()->role_id, $roles)) {
            return redirect('/'); // Redirect to home or an unauthorized page
        }

        return $next($request);    }
}