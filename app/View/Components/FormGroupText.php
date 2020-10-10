<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroupText extends Component
{
    
    public $fieldId;
    public $fieldName;
    public $fieldDescription;
    public $errors;
    public $value;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldId, $fieldName, $fieldDescription, $errors, $value = null)
    {
        $this->fieldId = $fieldId;
        $this->fieldName = $fieldName;
        $this->fieldDescription = $fieldDescription;
        $this->errors = $errors;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group-text')
            ->with('fieldId', $this->fieldId)
            ->with('fieldName', $this->fieldName)
            ->with('fieldDescription', $this->fieldDescription)
            ->with('value', $this->value)
            ->with('errors', $this->errors);
    }
}
