<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

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
        $roles = array_map('intval', explode('-', $rolId));
        if (!in_array($request->user()->rol->id, $roles)) {
            return redirect()->route('inicio.index');
        }
        
        return $next($request);
    }

}