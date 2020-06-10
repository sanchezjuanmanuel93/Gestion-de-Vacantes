<?php

namespace App;

class MenuItemGroup
{    
    public $groupName;

    public $menuItems;
    
    public $roles;

    /**
     * Create a new Menu Item Group instance.
     *
     * @return void
     */
    public function __construct($groupName, $menuItems, $roles)
    {
        $this->groupName = $groupName;
        $this->menuItems = $menuItems;
        $this->roles = collect($roles);
    }
}
