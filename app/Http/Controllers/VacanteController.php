<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacanteRequest;
use App\Materia;
use App\Postulacion;
use App\Rol;
use App\Vacante;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\User;

class VacanteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Nombre de la materia, la fecha de apertura de la vacante, la fecha de cierre de la vacante, el nombre del puesto
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = new DateTime();
        $vacantes_abiertas = Vacante::with('postulaciones')
            ->with('materia')
            ->with('postulaciones.usuario')
            ->get();

        return view('vacante.index', ["vacantes" => $vacantes_abiertas, "postulanteId" => Rol::$POSTULANTE]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::all();
        return view('vacante.create', ["materias" => $materias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacanteRequest $request)
    {
        Vacante::create([
            'id_materia' => $request->input('id-materia'),
            'fecha_apertura' => $request->input('fecha-apertura'),
            'fecha_cierre_estipulada' => $request->input('fecha-cierre'),
            'nombre_puesto' => $request->input('nombre-puesto'),
            'descripcion_puesto' => $request->input('descripcion-puesto'),
        ]);
        return redirect()->route("vacante.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        $vacante = Vacante::with('postulaciones')
            ->with('materia')
            ->with('postulaciones.usuario')
            ->where('vacante.id', '=', $vacante->id)
            ->first();
        switch ($vacante->status()) {
            case Vacante::$ABIERTA:
                $state = "Abierta";
                break;
            case Vacante::$CERRADA:
                $state = "Cerrada";
                break;
            case Vacante::$FINALIZADA:
                $state = "Finalizada";
                break;
            default:
                $state = "Creada";
                break;
        }
        return view('vacante.show', ["vacante" => $vacante, "state" => $state]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexAbierta()
    {
        $now = new DateTime();
        $vacantes_abiertas = Vacante::with('postulaciones')
            ->with('materia')
            ->with('postulaciones.usuario')
            ->where('vacante.fecha_apertura', '<=', $now)
            ->whereNull('vacante.fecha_cierre')
            ->where('vacante.fecha_cierre_estipulada', '>', $now)
            ->get();

        return view('vacante.abierta.index', ["vacantes" => $vacantes_abiertas]);
    }

    public function publicarOrdenDeMerito(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->except(['_token', 'id_vacante']) as $key => $value) {
                $id_postulacion = explode('postulacion-', $key)[1];
                $postulacion = Postulacion::where('id', "=", $id_postulacion)->first();
                $postulacion->puntaje = $value;
                $postulacion->save();
            }
            $vacante = Vacante::where('id', '=', $request->input('id_vacante'))->first();
            $vacante->fecha_orden_merito = Carbon::now();
            $vacante->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return Redirect::back();
    }

    /**
     * Recover usuario in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cerrarAnticipadamente($id)
    {
        $now = Carbon::now();
        $vacante = Vacante::where('id', $id)
            ->first();
        $vacante->fecha_cierre = $now;
        $vacante->update();

        $users = User::where('id_rol', Rol::$RESPONSABLE_ADMINISTRATIVO)
        ->pluck('email');

        Mail::to(env('MAIL_USERNAME'))
        ->bcc($users)
        ->send(new \App\Mail\CierreVacanteMail($now, [$vacante] , "Mensaje de prueba."));
        
        return redirect()->route("vacante.index");
    }
}
