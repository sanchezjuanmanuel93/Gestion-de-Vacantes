<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroupSelect extends Component
{
    public $fieldId;
    public $fieldName;
    public $fieldDescription;
    public $errors;
    public $collection;
    public $keyField;
    public $valueField;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldId, $fieldName, $fieldDescription, $errors, $keyField, $valueField, $collection)
    {
        $this->fieldId = $fieldId;
        $this->fieldName = $fieldName;
        $this->fieldDescription = $fieldDescription;
        $this->errors = $errors;
        $this->keyField = $keyField;
        $this->valueField = $valueField;
        $this->collection = $collection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group-select')
            ->with('fieldId', $this->fieldId)
            ->with('fieldName', $this->fieldName)
            ->with('fieldDescription', $this->fieldDescription)
            ->with('errors', $this->errors)
            ->with('keyField', $this->keyField)
            ->with('valueField', $this->valueField)
            ->with('collection', $this->collection);
    }
}
