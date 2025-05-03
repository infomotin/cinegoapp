<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if( $request->user()->role !== $role) {
            // User is not authenticated or does not have the required role
            return redirect('/dashboard'); // Redirect to a different page or show an error
        }
        return $next($request);
    }
}
