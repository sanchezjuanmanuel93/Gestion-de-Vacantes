<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UploadFile extends Component
{
    public $fieldName;
    public $errors;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldName, $errors)
    {
        $this->fieldName = $fieldName;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.upload-file')
            ->with('errors', $this->errors)
            ->with('fieldName', $this->fieldName);
    }
}
