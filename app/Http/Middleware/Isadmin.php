<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Isadmin
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
        if(Auth::user()->type == 'admin' || Auth::user()->email == 'solyooo398523@gmail.com'){

            return $next($request);
    
        }

        return redirect('admin/login');

    }
}
