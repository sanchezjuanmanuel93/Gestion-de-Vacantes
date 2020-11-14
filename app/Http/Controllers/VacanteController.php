<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterVacantesRequest;
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
use Illuminate\Database\Eloquent\Builder;
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
    public function index(FilterVacantesRequest $request)
    {
        $now = Carbon::now();
        $vacantes = Vacante::with('postulaciones')
            ->with('materia')
            ->with('postulaciones.usuario');
             
        $id_materia = $request->get('id-materia');
        $apertura_fecha_inicio = $request->get('apertura_fecha_inicio');
        $apertura_fecha_fin = $request->get('apertura_fecha_fin');
        $cierre_fecha_inicio = $request->get('cierre_fecha_inicio');
        $cierre_fecha_fin = $request->get('cierre_fecha_fin');
        $orden_merito_inicio = $request->get('orden_merito_inicio');
        $orden_merito_fin= $request->get('orden_merito_fin');
        $estados = collect($request->get('estados') ?? []);
        
        if($estados->count() > 0){
            $estadoCreada = $estados->contains('creada');
            $estadoAbierta = $estados->contains('abierta');
            $estadoCerrada = $estados->contains('cerrada');
            $estadoFinalizada = $estados->contains('finalizada');
        } else {
            $estadoCreada = true;
            $estadoAbierta = true;
            $estadoCerrada = true;
            $estadoFinalizada = true;
        }

        if ($id_materia) {
            $vacantes->where('id_materia', $id_materia);
        }

        if ($apertura_fecha_inicio) {
            $vacantes->whereDate('fecha_apertura', '>=' ,$apertura_fecha_inicio);
        }
        if ($apertura_fecha_fin) {
            $vacantes->whereDate('fecha_apertura', '<=' ,$apertura_fecha_fin);
        }

        if ($cierre_fecha_inicio) {
            $vacantes->whereDate('fecha_cierre_estipulada', '>=', $cierre_fecha_inicio);
        }

        if ($cierre_fecha_fin) {
            $vacantes->whereDate('fecha_cierre_estipulada', '<=', $cierre_fecha_fin);
        }

        if ($orden_merito_inicio) {
            $vacantes->whereDate('fecha_orden_merito', '>=', $orden_merito_inicio);
        }

        if ($orden_merito_fin) {
            $vacantes->whereDate('fecha_orden_merito', '<=', $orden_merito_fin);
        }

        if (!$estadoCreada) {
            $vacantes->whereRaw('NOT (fecha_cierre IS NULL AND DATE(fecha_apertura) > CURDATE())');  
        }
        if (!$estadoAbierta) {
            $vacantes->whereRaw('NOT (fecha_cierre IS NULL AND DATE(fecha_apertura) <= CURDATE())');
        }
        if (!$estadoCerrada) {
            $vacantes->whereRaw('NOT (fecha_cierre IS NOT NULL AND fecha_orden_merito  IS NULL)');
        }
        if (!$estadoFinalizada) {
            $vacantes->whereRaw('NOT (fecha_cierre IS NOT NULL AND fecha_orden_merito  IS NOT NULL)');
        }

        $vacantes_abiertas = $vacantes->paginate(5);

        return view('vacante.index', 
        [
            "vacantes" => $vacantes_abiertas, 
            "postulanteId" => Rol::$POSTULANTE,
            "id_materia" => $id_materia,
            "apertura_fecha_inicio" => $apertura_fecha_inicio,
            "apertura_fecha_fin" => $apertura_fecha_fin,
            "cierre_fecha_inicio" => $cierre_fecha_inicio,
            "cierre_fecha_fin" => $cierre_fecha_fin,
            "orden_merito_inicio" => $orden_merito_inicio,
            "orden_merito_fin" => $orden_merito_fin,
            "estadoCreada" => $estadoCreada,
            "estadoAbierta" => $estadoAbierta,
            "estadoCerrada" => $estadoCerrada,
            "estadoFinalizada" => $estadoFinalizada
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::orderBy('nombre', 'asc')->get();
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
        return view('vacante.show', ["vacante" => $vacante, "state" => $this->getStatus($vacante)]);
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

    private function getStatus($vacante)
    {
        $state = "";
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
        return $state;
    }

    public function publicarOrdenDeMerito(Request $request)
    {
        dd("prueba");
        $emails = User::where('id_rol', Rol::$RESPONSABLE_ADMINISTRATIVO)
        ->pluck('email');
        DB::beginTransaction();
        try {
            $now =Carbon::now();
            foreach ($request->except(['_token', 'id_vacante']) as $key => $value) {
                $id_postulacion = explode('postulacion-', $key)[1];
                $postulacion = Postulacion::where('id', "=", $id_postulacion)->first();
                $postulacion->puntaje = $value;
                $postulacion->save();
                $emails->push($postulacion->usuario->email);
            }
            $vacante = Vacante::where('id', '=', $request->input('id_vacante'))->first();
            $vacante->fecha_orden_merito = $now;
            $vacante->save();
            DB::commit();

            Mail::to(env('MAIL_USERNAME'))
            ->bcc($emails)
            ->send(new \App\Mail\PublicacionOrdenDeMeritoMail($now, $vacante));

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
        $vacante = Vacante::with('postulaciones')
            ->with('materia')
            ->with('postulaciones.usuario')
            ->where('id', $id)
            ->first();
        $vacante->fecha_cierre = $now;
        $vacante->update();

        $users = User::where('id_rol', Rol::$RESPONSABLE_ADMINISTRATIVO)
            ->pluck('email');

        Mail::to(env('MAIL_USERNAME'))
            ->bcc($users)
            ->send(new \App\Mail\CierreVacanteMail($now, [$vacante]));

        return redirect()->route("vacante.index");
    }
}
