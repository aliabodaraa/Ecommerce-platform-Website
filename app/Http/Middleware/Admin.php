<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class Admin
{
    
    public function handle(Request $request, Closure $next)
    {
       
        $user_admin=auth()->user()->admin;
       // dd(auth()->user()->id);
       if($user_admin==1 || auth()->user()->id==User::min('id')){
        return $next($request);
       }
       return abort(404);
    }
}
