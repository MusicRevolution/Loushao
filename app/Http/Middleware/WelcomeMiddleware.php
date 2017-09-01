<?php

namespace App\Http\Middleware;

use Closure;
use anlutro\LaravelSettings\Facade as Setting;

class WelcomeMiddleware
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
        $open = Setting::get('setting.welcome', '0');
        if($open == '0')
            return redirect('/welcome');

        return $next($request);
    }
}