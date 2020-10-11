<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulacionStoreRequest;
use App\Postulacion;
use App\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        $postulaciones = Postulacion::where('id_usuario', Auth::id())->get();
        return view('postulacion.index', compact('postulaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostulacionStoreRequest $request)
    {
        $filePath = "";
        $vacante = Vacante::find($request->input('id_vacante'))->with('materia')->first();
        $existe_postulacion = Postulacion::where('id_usuario', '=', Auth::user()->id)->where('id_vacante', '=', $request->id_vacante)->get();
        if (empty($existe_postulacion)) {
            return back()->with('error', 'Ya estas postulado');
        }

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $name = Auth::user()->apellido . "_" . Auth::user()->nombre . "-" . time();
            $filePath = 'cvs/' . $name;
            if (!App::environment('local')) {
                //Storage::disk('s3')->put($filePath, file_get_contents($file));
            }
        }
        Postulacion::create([
            'id_vacante' => $request->input('id_vacante'),
            'id_usuario' => Auth::user()->id,
            'cv_path' => $filePath
        ]);
        Mail::to(env('MAIL_USERNAME'))
            ->send(new \App\Mail\PostulacionMail($vacante));
        return redirect(route('vacante.abierta.index'));
    }

    public function puntajePostulado(Request $request)
    {
        try {
            $postulacion = Postulacion::where('id', '=', $request->input('id_postulacion'))->first();
            $postulacion->puntaje = $request->input('puntaje');
            $postulacion->save();
        } catch (\Throwable $th) {
        }
        return redirect(route('vacante.show', $postulacion->id_vacante));
    }
}
