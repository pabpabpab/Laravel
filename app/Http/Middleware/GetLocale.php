<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GetLocale
{
    const DEFAULT_LOCALE = 'ru';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale') ?? static::DEFAULT_LOCALE;
        App::setLocale($locale);
        return $next($request);
    }
}
