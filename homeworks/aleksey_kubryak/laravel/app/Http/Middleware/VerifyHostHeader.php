<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyHostHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $appUrl = config('app.url');
        $allowedHost = parse_url($appUrl, PHP_URL_HOST);

        $requestHost = $request->getHost();

        if ($allowedHost !== $requestHost) {
            return response('Ошибка: Неверный заголовок Host', 403);
        }

        return $next($request);
    }
}
