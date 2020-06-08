<?php

namespace App\Http\Controllers;

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
    public function solicitarSoporte()
    {
        return view('soporte.solicitar-soporte');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function consultaFAQs()
    {
        return view('soporte.consultar-faqs');
    }
}
