<?php

namespace App\Http\Middleware;

use App\Models\WebsiteLanguage;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $value = session('locale');
        if($value && $value != ''){
            App::setLocale($value);
        } else {
            $language = WebsiteLanguage::where('status', 1)->first();
            App::setLocale($language->code);
        }
        return $next($request);
    }
}
