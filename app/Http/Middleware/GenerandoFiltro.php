<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class GenerandoFiltro
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url=$request->url();

        if(!(Session::has('idUsuario')) && $url!='http://localhost/WebSistemaVenta/public' && !($request->has('emalCorreoElectronicoLogin')))
        {
          return redirect('/');
        }
        $response = $next($request);

        //after request

        return $response;
    }
}