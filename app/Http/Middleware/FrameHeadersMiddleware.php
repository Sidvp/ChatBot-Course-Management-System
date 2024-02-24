<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrameHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        // $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        // $response->headers->set('X-Frame-Options', 'SAMEORIGIN', false);
        //$response->header('X-Frame-Options', 'ALLOWALL');
        // $response->header('X-Frame-Options', 'ALLOW FROM https://www.facebook.com');
        // $response->headers->set('X-Frame-Options', '*');
        return $response;
    }
    
    
    // public function handle(Request $request, Closure $next): Response
    // {
    //     $response = $next($request);
    //     $response->header('X-Frame-Options', 'ALLOW FROM https://cares.goa.gov.in/prerna/');
    //     return $response;
    //     // return $next($request);
    // }
    
    // public function handle($request, Closure $next)
    // {
    //     $response = $next($request);

    //     $response->headers->set('X-Frame-Options', 'SAMEORIGIN', false);

    //     return $response;
        
        
    // }
}

 

// namespace App\Http\Middleware;
// use Closure;

// public function handle($request, Closure $next)
// {
//      $response = $next($request);
//      $response->header('X-Frame-Options', 'ALLOW FROM https://example.com/');
//      return $response;
//  }