<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SEOMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Add SEO headers
        if ($response->getStatusCode() === 200) {
            $response->headers->set('X-Robots-Tag', 'index, follow');
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Frame-Options', 'DENY');
            $response->headers->set('X-XSS-Protection', '1; mode=block');
        }
        
        // Add performance headers
        $response->headers->set('X-DNS-Prefetch-Control', 'on');
        
        return $response;
    }
}
