<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class PrimeiroMidleware
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
        Log::debug('Passou pelo primeiro middleware. Em pagina '.$url);
        $response = $next($request);
        Log::debug("PASSOU PELO PRIMEIRO MIDDLEWARE DEPOIS");
        return $response;
    }
}
