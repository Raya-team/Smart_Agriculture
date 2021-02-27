<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->status)
        {
            if ($request->user()->Level()){
                return $next($request);
            }else{
                return redirect('/user/dashboard');
            }
        }
        return redirect('login');
    }
}
