<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $route;
    public $method;
    public $success;
    public $successMessage;
    public $message;
    public $saveButtonText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $method, $success = false, $successMessage = null, $message = null, $saveButtonText = null)
    {
        $this->route = $route;
        $this->method = $method;
        $this->success = $success;
        $this->successMessage = $successMessage;
        $this->message = $message;
        $this->saveButtonText = $saveButtonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
