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
                ->where('vacante.fecha_cierre', '>', $now)
                ->orderBy('vacante.fecha_cierre', 'asc')
                ->get();
            return view('index', ['vacantes' => $vacantes]);
        }
    }
}
