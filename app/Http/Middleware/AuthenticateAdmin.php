<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AuthenticateAdmin {

    public function handle($request, Closure $next, $guard = null) {
        if(Auth::guard($guard)->check()){
            if((int) Auth::guard($guard)->user()->admin == 0){
                Auth::guard($guard)->logout();
                redirect()->route('admin.login')->with('error', 'You dont have admin access');
            }
        }
        
        if(!Auth::guard($guard)->check()){
            return redirect('/admin/login');
        }
        return $next($request);
    }

}
