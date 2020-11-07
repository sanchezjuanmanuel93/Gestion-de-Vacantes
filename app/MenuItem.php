<?php

namespace App;

class MenuItem 
{    
    public $displayName;

    public $routeName;

    public $url;

    public $iconName;

    public $roles;

    /**
     * Create a new Menu Item instance.
     *
     * @return void
     */
    public function __construct($displayName, $routeName = null, $iconName, $roles)
    {
        $this->displayName = $displayName;
        $this->routeName = $routeName;
        $this->iconName = $iconName;
        $this->roles = collect($roles);
    }
}
