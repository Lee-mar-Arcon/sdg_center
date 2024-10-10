<?php

// app/Http/Middleware/VerifyCsrfToken.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken
{
    protected $except = [
        'sdg/store', // Make sure this is exactly as your route
    ];

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
