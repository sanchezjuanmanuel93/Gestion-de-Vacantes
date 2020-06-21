<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacanteRequest;
use App\Materia;
use App\Vacante;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VacanteController extends Controller
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
            ->where('vacante.fecha_apertura', '<=', $now)
            ->where('vacante.fecha_cierre', '>', $now)
            ->get();

        return view('vacante.index', ["vacantes" => $vacantes_abiertas]);
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
            'fecha_cierre' => $request->input('fecha-cierre'),
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
    public function show($id)
    {
        //
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
            ->where('vacante.fecha_cierre', '>', $now)
            ->get();

        return view('vacante.abierta.index', ["vacantes" => $vacantes_abiertas]);
    }
}
