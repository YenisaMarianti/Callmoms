<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if ($request->session()->has('users_data')) {
            $userRole = $request->session()->get('users_data')->peran;
            if (in_array($userRole, $roles)) {
                return $next($request);
            }
        }

        return redirect('/dashboard');
    }
}
