<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHost
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedHost = parse_url(env('APP_URL'), PHP_URL_HOST);

        $currentHost = parse_url($request->header('host'), PHP_URL_HOST);

        if ($currentHost !== $expectedHost) {
            return response()->json(['error' => 'Request from invalid host'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
