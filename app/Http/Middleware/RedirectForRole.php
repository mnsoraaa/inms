<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectForRole
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
        if(Auth::check()){

            if(Auth::user()->position == 1){
                return redirect('/jjim/dashboard');
            }elseif(Auth::user()->position == 2){
                return redirect('/coordinator/dashboard');
            }elseif(Auth::user()->position == 3){
                return redirect('/facultysv/dashboard');
            }elseif(Auth::user()->position == 4){
                return redirect('/industrialsv/dashboard');
            }elseif(Auth::user()->position == 5){
                return redirect('/student/dashboard');
            }
            
        }else{
            return redirect('/home');
        }
        return $next($request);
    }
}
