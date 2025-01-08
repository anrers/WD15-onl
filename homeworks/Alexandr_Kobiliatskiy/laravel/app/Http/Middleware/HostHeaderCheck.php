<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HostHeaderCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $appUrl = env('APP_URL');
        $headerHost = 'http://' . $request->header('host');
        if($headerHost !== $appUrl) {
            return response(status: 401);
        }

        return $next($request);
    }
}
