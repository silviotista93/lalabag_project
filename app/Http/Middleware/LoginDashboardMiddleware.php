<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class LoginDashboardMiddleware
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
        if (Auth::user()) {
            if (Auth::user()->estado !== "activo") {
                $msg = "No tiene permisos para acceder, consulte con el administrador";
                Auth::logout();
                return back()->with('eliminar',$msg);
            } else {
                if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Vendedor') || Auth::user()->hasRole('Bodega')) {
                    return $next($request);

                } else {

                    return redirect('/login')->with('eliminar','No tiene permisos para acceder al sistema, consulte con el administrador');

                }

            }
        }else{
            return redirect('/login');
        }
    }
}
