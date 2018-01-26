<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class IsFestival
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



        if(Auth::user()->type != 'festival'){
            
            return redirect('login');
        }
        
        return $next($request);


    }
}
