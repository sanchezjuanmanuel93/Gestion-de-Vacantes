<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $rolId)
    {
        if ($request->user()->rol->id != $rolId) {
            return redirect()->route('inicio.index');
        }

        return $next($request);
    }

}