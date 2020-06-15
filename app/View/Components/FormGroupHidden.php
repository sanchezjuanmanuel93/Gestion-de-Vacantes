<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroupHidden extends Component
{
    public $fieldId;
    public $fieldName;
    public $value;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldId, $fieldName, $value)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group-hidden');
    }
}
