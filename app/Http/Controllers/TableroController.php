<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuItemsService;

class TableroController extends Controller
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tablero')
        ->with('menuItems', $this->menuItemsService->getMenuItems());
    }
}
