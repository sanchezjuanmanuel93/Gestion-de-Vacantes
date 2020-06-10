<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuItemsService;
use Illuminate\Support\Facades\Auth;

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
            return view('index');
        }
    }
}
