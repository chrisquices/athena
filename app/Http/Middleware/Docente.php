<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
use DB;
use Auth;

class Docente
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
								$rol = Auth::user()->role;

								if ($rol == 'Administrador') {
												return $next($request);
								}

								if ($rol == 'Docente') {
												return $next($request);
								}

								return redirect('/')->with('permisos', '¡No tienes permisos suficientes para ingresar en esta página!');
				}
}
