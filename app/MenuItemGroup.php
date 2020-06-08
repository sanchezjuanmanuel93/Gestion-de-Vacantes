<?php

namespace App;

class MenuItemGroup
{    
    public $groupName;

    public $menuItems;

    /**
     * Create a new Menu Item Group instance.
     *
     * @return void
     */
    public function __construct($groupName, $menuItems)
    {
        $this->groupName = $groupName;
        $this->menuItems = $menuItems;
    }
}
