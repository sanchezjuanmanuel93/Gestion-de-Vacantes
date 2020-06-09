<?php

namespace App\Services;

use App\MenuItem;
use App\MenuItemGroup;

class MenuItemsService
{
    private $menuItems;

    public function __construct(){
        $this->menuItems = [
            new MenuItemGroup(
                "Vacantes",
                [
                    new MenuItem("Abrir Vacante", "vacante.create", "fa-plus", []),
                    new MenuItem("Consultar Vacantes Abiertas", "consultar-vacantes-abiertas", "fa-list-ul", []),
                    new MenuItem("Consultar Vacantes", "vacante.index", "fa-list-ul", [])
                ]
            ),
            new MenuItemGroup(
                "Postulaciones",
                [
                    new MenuItem("Mis Postulaciones", "consultar-postulaciones", "fa-plus", [])
                ]
            ),
            new MenuItemGroup(
                "Usuarios",
                [
                    new MenuItem("Crear Usuario", "alta-usuario", "fa-plus", []),
                    new MenuItem("Consultar Usuarios", "consultar-usuarios", "fa-list-ul", [])
                ]
            ),
            new MenuItemGroup(
                "Soporte",
                [
                    new MenuItem("Consultar FAQs", "consultar-faqs", "fa-info-circle", []),
                    new MenuItem("Solicitar Soporte", "solicitar-soporte", "fa-question-circle", [])
                ]
            )
        ];
    }


    /**
     * Get Menu Items Grouped.
     *
     * @return \App\MenuItemGroup[]
     */
    public function getMenuItemsGrouped()
    {
        return $this->menuItems;
    }


    /**
     * Get Menu Items.
     *
     * @return \App\MenuItem[]
     */
    public function getMenuItems()
    {
        $menuItems = [];
        foreach ($this->menuItems as $group) {
            foreach ($group->menuItems as $item) {
                $menuItems[] = $item;
            }
        }
        return $menuItems;
    }
}
