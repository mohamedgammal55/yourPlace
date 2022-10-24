<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        app()->setLocale('ar');
        if($request->header('lang') !== null && $request->header('lang') == 'en' )
            app()->setLocale('ar');

        return $next($request);
    }
}
