<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacanteRequest;
use App\Materia;
use App\Vacante;
use Illuminate\Http\Request;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vacante.consultar-vacantes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::all();
        return view('vacante.alta-vacante', ["materias" => $materias]);
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
            'nombre_puesto' => $request->input('nobre-puesto'),
            'descripcion_puesto' => $request->input('descripcion-puesto'),
        ]);
        return view('vacante.consultar-vacantes');
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
    public function consultaListaVacantesAbiertas()
    {
        return view('vacante.consultar-vacantes-abiertas');
    }
}
