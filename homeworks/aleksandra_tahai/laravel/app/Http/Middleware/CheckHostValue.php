<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class CheckHostValue
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->host();
        $mainHost = Config::get('app.url');
        $mainHost = str_replace('http://', '', $mainHost);

        if ($host === $mainHost) {
            return $next($request);
        }

        return response('Ошибка: Неверный заголовок Host', 403);
    }
}
