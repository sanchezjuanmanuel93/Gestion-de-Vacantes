<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulacionStoreRequest;
use App\Postulacion;
use App\Vacante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostulacionController extends Controller
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
        return view('postulacion.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostulacionStoreRequest $request)
    {
        $vacante = Vacante::find($request->input('id_vacante'))->with('materia')->first();
        $existe_postulacion = Postulacion::where('id_usuario', '=', Auth::user()->id)->where('id_vacante', '=', $request->id_vacante)->get();
        if (empty($existe_postulacion)) {
            return back()->with('error', 'Ya estas postulado');
        }
        Postulacion::create([
            'id_vacante' => $request->input('id_vacante'),
            'id_usuario' => Auth::user()->id,
        ]);
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $name = Auth::user()->apellido . "_" . Auth::user()->nombre . "-" . time();
            $filePath = 'cvs/' . $name;
            // Storage::disk('s3')->put($filePath, file_get_contents($file));
        }
        Mail::
            // to($usuario->email)
            to("sanchez.juanmy@gmail.com")
            ->send(new \App\Mail\PostulacionMail($vacante));
        return redirect(route('vacante.abierta.index'));
    }
}
