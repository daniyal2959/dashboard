<?php

namespace App\Http\Middleware\System;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShowNotifications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( Auth::hasUser() ) {
            $notifications = auth()->user()->unreadNotifications;
            $request->merge(['notifications' => $notifications]);
        }
        return $next($request);
    }
}
