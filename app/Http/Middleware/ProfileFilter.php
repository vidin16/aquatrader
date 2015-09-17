<?php

namespace App\Http\Middleware;

use Closure;

use \Illuminate\Contracts\Auth\Guard; //path

class ProfileFilter
{
    protected $guard; //to store the injected guard object
                                //Guard id short hand for path            
    public function __construct(Guard $guard){
        $this->guard = $guard;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request->route());
        $profileID = $request->route('users');
        // if(\Auth::user()->id != $profileID)This is the facade method and you don't need construct at the top
        if ($this->guard->user()->id != $profileID){//login user is not the user in the route               
            if($request->ajax()){
               return response('Unauthorized.', 401); //kick them out
            }else{
                return redirect()->guest('login');
            }
        }
        return $next($request);
    }
}
