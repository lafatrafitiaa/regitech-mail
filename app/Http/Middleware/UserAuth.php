<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {

    //     // if($request->path()=="crudAjout"){
    //     //     if($request->session()->get('id') != 2){
    //     //         return redirect('/');
    //     //     }
    //     // }
    //     return $next($request);
    // }

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            // Replace the ? marks with appropriate value
            if ($user->int_role_id != 2) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
