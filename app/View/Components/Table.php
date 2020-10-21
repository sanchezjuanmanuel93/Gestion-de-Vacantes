<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $tableId;
    public $dataTable;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tableId, $dataTable = false)
    {
        $this->tableId = $tableId;
        $this->dataTable = $dataTable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table')
            ->with('tableId', $this->tableId);
    }
}
