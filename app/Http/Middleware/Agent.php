<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class Agent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            // Redirect based on user role
            if ($role === 'admin') {
                return redirect('admin/dashboard');
            } elseif ($role === 'user') {
                return redirect('dashboard');
            }
        }

        // Allow access if role is agent
        if (Auth::user()->role === 'agent') {
            return $next($request);
        }

        // Default redirect if not authorized
        return redirect('/');
    }
}
