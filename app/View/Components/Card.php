<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $color;
    public $displayName;
    public $displayDescription;
    public $iconName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $displayName, $displayDescription, $iconName)
    {
        $this->color = $color;
        $this->displayName = $displayName;
        $this->displayDescription = $displayDescription;
        $this->iconName = $iconName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
