<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = ['en', 'uk'];
        $defaultLocale = 'en';

        // Get locale from route parameter (since we're using route groups)
        $locale = $request->route('locale');

        // If no locale in route, get from URL segment
        if (!$locale) {
            $locale = $request->segment(1);
        }

        // If locale is not available, use default
        if (!in_array($locale, $availableLocales)) {
            $locale = $defaultLocale;
        }

        // Set application locale
        app()->setLocale($locale);

        return $next($request);
    }
}
