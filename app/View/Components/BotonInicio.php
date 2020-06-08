<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BotonInicio extends Component
{
    public $menuItem;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuItem)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.boton-inicio');
    }
}
