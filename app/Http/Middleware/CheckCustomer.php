<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if(!auth()->user()){

            if($request->route()->uri() == 'add/to/liked/list/{slug}'){
                session(['last_visited_url' => $request->route()->uri()]);
            } else {
                session(['last_visited_url' => '']);
            }

            return redirect('/user/login');
        }

        if(auth()->user()->status == 0){
            return redirect('/');
        } else {
            if (auth()->user()->user_type == 3) {
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }
}
