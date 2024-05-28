<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerCheck
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
        $user = session()->get('user');
        if($user==null)
            return redirect('/notLoggedIn');
        else if($user->role == 'customer'){
            return $next($request);
        }
        else if($user->role=='admin')
            return redirect('/adminCannotOrder');

        return $next($request);
    }
}
