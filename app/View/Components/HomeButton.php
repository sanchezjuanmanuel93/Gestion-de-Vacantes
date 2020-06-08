<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomeButton extends Component
{
    public $displayName;

    public $routeName;

    public $iconName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($displayName, $routeName, $iconName)
    {
        $this->displayName = $displayName;
        $this->routeName = $routeName;
        $this->iconName = $iconName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.home-button');
    }
}
