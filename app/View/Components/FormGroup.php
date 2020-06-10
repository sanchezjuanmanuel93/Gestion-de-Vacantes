<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public $fieldName;
    public $fieldDescription;
    public $errors;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldName, $fieldDescription, $errors)
    {
        $this->fieldName = $fieldName;
        $this->fieldDescription = $fieldDescription;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group')
            ->with('fieldName', $this->fieldName)
            ->with('fieldDescription', $this->fieldDescription)
            ->with('errors', $this->errors);
    }
}
