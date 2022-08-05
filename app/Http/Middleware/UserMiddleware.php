<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::guard('user_login')->guest()){
        //     if($request->ajax() || $request->wantsJson()){
        //         return response('Unauthorized', 401);
        //     }else{
        //         return redirect('/userProfile');
        //     }
        // }

        // if(Auth::guard('user_login')->guest()){
        //  return redirect('/userProfile');
        // }
        return $next($request);
    }
}
