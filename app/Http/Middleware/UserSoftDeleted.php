<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class UserSoftDeleted
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user) {
            if ($user->deleted_at) {
                Auth::logout();
                return redirect()->route('inicio.index');
            }
        }
        return $next($request);
    }
}
