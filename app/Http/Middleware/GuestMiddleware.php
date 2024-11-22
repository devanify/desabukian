<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jika user id sudah dalam keadaan login
        if(isset(Auth::user()->id) != ''){
            return redirect()->route('dashboard')->with('Logged', 'Anda Sudah Login!');
        }
        return $next($request);
    }
}
