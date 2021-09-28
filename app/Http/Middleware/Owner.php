<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Owner
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
       // aliRamadanAbodaraa@yahoo.com
       $user_email=auth()->user()->email;
       if($user_email=='aliRamadanAboudaraa@yahoo.com'){
        return $next($request);
       }
       return abort(404);
        
    }
}
