<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSocialite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->social!="facebook" and $request->social!="google")
            return redirect("/login");
        return $next($request);
    }
}
