<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SplitButton extends Component
{

    public $routeName;
    public $className;
    public $iconName;
    public $displayName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($routeName, $className, $iconName, $displayName)
    {
        $this->routeName = $routeName;
        $this->className = $className;
        $this->iconName = $iconName;
        $this->displayName = $displayName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.split-button');
    }
}
