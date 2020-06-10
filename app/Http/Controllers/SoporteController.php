<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class SoporteController extends Controller
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
        return view('soporte.create');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        return view('soporte.create');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $faqs = [];
        $faqs[] = new FAQ("¿Cómo ingreso al sistema por primera vez?", "Debe acudir al departamento administrativo a la Universidad para que le sea asignado una cuenta con el correo de la misma." );
        $faqs[] = new FAQ("¿Cómo recupero mi contraseña?", "Puede seleccionar el opción Recuperar contraseña del apartado Iniciar Sesión" );
        $faqs[] = new FAQ("¿Cómo informan a los usuarios acerca de los resultados de las postulaciones?", "Se envian correos periodicos a todos los involucrados en las postulaciones. En caso de que no los esté recibiendo, revise su casilla de correo no deseado." );
        $faqs[] = new FAQ("¿Donde puedo acudir si mi duda no esta en este listado?", "Puede utilizar la opción Solicitar Soporte para resolver cualquier duda o consulta que tenga." );
        return view('soporte.faqs.index')
        ->with("faqs", $faqs);
    }
}
