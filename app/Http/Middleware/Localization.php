<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('locale')){
            App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
