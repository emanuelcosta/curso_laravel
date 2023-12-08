<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class SegundoMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->getUri();
        Log::debug('Passou pelo segundo middleware. ANTES');
        $response = $next($request);
        Log::debug('Passou pelo segundo middleware. DEPOIS');
        return $response;
    }
}
