<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $collection;
    public $columns;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($collection, $columns)
    {
        $this->collection = $collection;
        $this->columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.data-table')
            ->with('title', $this->title)
            ->with('columns', $this->columns)
            ->with('collection', $this->collection);
    }
}
