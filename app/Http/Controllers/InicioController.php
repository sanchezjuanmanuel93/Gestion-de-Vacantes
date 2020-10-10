<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuItemsService;
use App\Vacante;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class InicioController extends Controller
{
    private $menuItemsService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MenuItemsService $menuItemsService)
    {
        $this->menuItemsService = $menuItemsService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return view('dashboard')
                ->with('menuItems', $this->menuItemsService->getMenuItems());
        } else {
            $now = new DateTime();
            $vacantes = Vacante::with('materia')
                ->where('vacante.fecha_apertura', '<=', $now)
                ->whereNull('vacante.fecha_cierre')
                ->where('vacante.fecha_cierre_estipulada', '>', $now)
                ->orderBy('vacante.fecha_cierre', 'asc')
                ->get();
            return view('index', ['vacantes' => $vacantes]);
        }
    }

    public function show($id)
    {
        if (Auth::check()) {
            return redirect()->route("vacante.show", $id);
        } else {
            $now = new DateTime();
            $vacante = Vacante::where('fecha_apertura', '<=', $now)
                ->where('fecha_cierre', '>', $now)
                ->where('id', '=', $id)
                ->first();
            if (isset($vacante)) {
                return view('show', ["vacante" => $vacante]);
            } else {
                return redirect()->route("inicio.index");
            }
        }
    }
}
