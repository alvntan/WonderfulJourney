<?php

namespace App\Http\Middleware;

use Closure;

class CheckMember
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
        if($request->user() == null) {
            return redirect('/');
        }
        if($request->user()->role != 'MEMBER') {
            return redirect('/');
        }
        return $next($request);
    }
}
