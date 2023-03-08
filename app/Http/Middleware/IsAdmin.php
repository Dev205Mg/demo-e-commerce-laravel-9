<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        /*Verifier si l'utilisateur connecter est admin */
        if(auth()->user()->admin == 1){
            /* si oui on continue le requete */
            return $next($request);
        } else{
            /* sinon on stop on met un erreur */
            abort(403);
        }
    }
}
