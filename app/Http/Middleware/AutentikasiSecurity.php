<?php

namespace App\Http\Middleware;

use Closure;

class AutentikasiSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {

        if (auth('user')->user()->role != 'security') {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('unauthorized-Access');
            }
        }

        return $next($request);
    }

}
