<?php

namespace App\Http\Middleware;

use Closure;

class AdminFilter
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
        //check for admin user
        if(\Auth::user()->admin == 0){
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            }else{
                return redirect()->guest('login');
            }
        }
        return $next($request);
    }
}
