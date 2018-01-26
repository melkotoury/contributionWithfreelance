<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class IsProgrammer
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



        if(Auth::user()->type == 'festival' OR 
           Auth::user()->type == 'festival_programmer' ){

           return $next($request);
            
        }
        
            return redirect('login');


    }
}
