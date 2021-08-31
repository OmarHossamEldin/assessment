<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\Localization as locale;
use Lang;

class Localization
{
    /**
     * handeling language by set locale language depending on
     * Content-Language header
     * read the language from the request header
     * if not set return u have to set Content-Language Header
     * set the local language
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('Content-Language');
        if (!$locale) {
            return response()->json(['message' => Lang::get('auth.setHeaderLang')], 200);
        }
        locale::setlocale($locale);
        return $next($request);
    }
}
