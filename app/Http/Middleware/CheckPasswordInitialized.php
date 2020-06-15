<?php

namespace App\Http\Middleware;

use Closure;

class CheckPasswordInitialized
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $requireInicialized)
    {
        $user = $request->user();
        if ($user) {
            $passwordInitialized = $user->password_initialized;
            if ($requireInicialized && !$passwordInitialized) {
                return redirect()->route('contraseña.inicializar.index');
            }
            if (!$requireInicialized && $passwordInitialized) {
                return redirect()->route('inicio.index');
            }
        }
        return $next($request);
    }
}
