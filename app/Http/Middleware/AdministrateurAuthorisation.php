<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdministrateurAuthorisation
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

        if ($request->session()->get('userlogged') === null){
            return redirect("/espace-client?errorType=logfirst");
        } else {
            $userinfo = $request->session()->get('userlogged');
            if ($userinfo->iduserrole === 1 || $userinfo === null) {
                return redirect('/');
            }
        }
        // dd($request->session()->get('userlogged'));
        return $next($request);
    }
}
