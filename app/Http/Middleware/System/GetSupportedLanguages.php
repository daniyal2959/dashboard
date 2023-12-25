<?php

namespace App\Http\Middleware\System;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class GetSupportedLanguages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = LaravelLocalization::getSupportedLocales();
        $request->merge(['languages' => $languages]);
        return $next($request);
    }
}
