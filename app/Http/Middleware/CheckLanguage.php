<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class CheckLanguage
{

    public function handle($request, Closure $next)
    {
        $languageId = $request->cookie('lang');
        if($languageId){
            App::setLocale($languageId);
        }
        return $next($request);
    }
}
