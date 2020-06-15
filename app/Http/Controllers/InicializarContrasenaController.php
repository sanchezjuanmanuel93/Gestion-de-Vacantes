<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ContrasenaEsValida;
use Illuminate\Support\Facades\Hash;
use App\User;

class InicializarContrasenaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.contrasena.inicializar.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate(
                [
                    'contrasenaNueva' => ['required'],
                    'contrasenaNuevaConfirmar' => ['required', 'same:contrasenaNueva'],
                ],
                [
                    'contrasenaNuevaConfirmar.required' => 'El campo Confirmar Contraseña Nueva es obligatorio.',
                    'contrasenaNuevaConfirmar.same' => 'Las contraseñas no coinciden'
                ]
            );

        User::find(auth()->user()->id)->update(
            [
                'password' => Hash::make($request->contrasenaNueva),
                'password_initialized' => true
            ]
        );
        return redirect()->route('inicio.index');
    }
}
