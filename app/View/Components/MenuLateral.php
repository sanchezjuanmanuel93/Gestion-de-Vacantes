<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\MenuItemsService;

class MenuLateral extends Component
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
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-lateral')
        ->with('menuItemsGrouped', $this->menuItemsService->getMenuItemsGrouped());
    }
}
