<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Rol;
use App\User;
use App\Mail\NuevoUsuarioMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
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
    public function create()
    {
        $roles = Rol::all();
        return view('usuario.create', ['roles' => $roles]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = DB::table('users')
            ->join('rol', 'users.id_rol', '=', 'rol.id')
            ->select('users.nombre', 'users.apellido', 'users.telefono', 'users.email', 'rol.descripcion as rolDescripcion')
            ->get();
        return view('usuario.index', ["usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $password = Str::random(8);
        $hashed_random_password = Hash::make($password);
        $usuario = User::create([
            'nombre' => $request->input('nombre'),
            'name' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'id_rol' => $request->input('rol'),
            'password' => $hashed_random_password,
        ]);

        Mail::to($usuario->email)
            ->send(new NuevoUsuarioMail($usuario, $password));

        return redirect()->route("usuario.index");
    }
}
