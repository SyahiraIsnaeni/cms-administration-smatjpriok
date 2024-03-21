<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && $request->session()->exists("admin")) {
            $role = Auth::user()->role;
            return redirect('/dashboard/' . $role);
        }elseif (Auth::check() && $request->session()->exists("osis")){
            $role = Auth::user()->role;
            return redirect('/dashboard/' . $role);
        }

        return $next($request);
    }
}
