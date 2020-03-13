<?php

namespace App\Http\Middleware;

use Closure;

class CheckCorrector
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
        if ($request->user()->role !== 'corrector')
        {
            if ($request->user()->role !== 'admin')
            {
                abort(404);
            }
        }

        return $next($request);
    }
}
