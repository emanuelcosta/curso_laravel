<?php

namespace App\Http\Middleware;

use Closure;

class ProdutoAdmin
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
        if ($request->session()->exists('login')) {
            if ($request->session()->get('login')['admin'] == true)
                return $next($request);
            else
                return redirect()->route('negadologin');
        }

        return redirect()->route('negado');
    }
}
