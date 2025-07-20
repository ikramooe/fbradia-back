<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Get the locale from session or default to 'en'
        $locale = $request->session()->get('locale', config('app.fallback_locale'));
        
        // Set the locale
        app()->setLocale($locale);
        
        return $next($request);
    }
}
