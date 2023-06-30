<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);
        if ($locale !== '' && strlen($locale) == 2) {
            if (in_array($locale, config()->get('app.avaible_locales'))){
                App::setLocale($locale);
                setlocale(LC_TIME, $locale);
            } else {
                return redirect(str_replace($locale.'/', '', $request->url()));
            }
        }
        return $next($request);
    }
}
