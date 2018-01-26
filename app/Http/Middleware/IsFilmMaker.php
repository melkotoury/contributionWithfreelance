<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class IsFilmMaker
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


        if(Auth::user()->type != 'film_maker'){
            
            return redirect('login');
        }

        return $next($request);

    }
}
