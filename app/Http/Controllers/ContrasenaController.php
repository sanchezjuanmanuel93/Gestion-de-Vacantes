<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Rules\ContrasenaEsValida;
use Illuminate\Support\Facades\Hash;
use App\User;
  
class ContrasenaController extends Controller
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
        return view('auth.contrasena.index');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'contrasenaActual' => ['required', new ContrasenaEsValida],
            'contrasenaNueva' => ['required'],
            'contrasenaNuevaConfirmar' => ['same:contrasenaNueva'],
        ],
        [
            'contrasenaActual.required' => 'El campo Contraseña es obligatorio.',
            'contrasenaNueva.required' => 'El campo Contraseña Nueva es obligatorio.',
            'contrasenaNuevaConfirmar.same' => 'Las contraseñas no coinciden'
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->contrasenaNueva)]);
        return view('auth.contrasena.create')
            ->with('success', true);
    }
}