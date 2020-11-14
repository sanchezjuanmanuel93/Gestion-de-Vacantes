<?php

namespace App\View\Components;

use App\Materia;
use Illuminate\View\Component;

class FormGroupSelectMateria extends Component
{

    public $materias;
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selected = null)
    {
        $this->materias = Materia::withTrashed()->get();
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group-select-materia');
    }
}
