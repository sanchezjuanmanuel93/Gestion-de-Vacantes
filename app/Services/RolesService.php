<?php

namespace App\Services;

use App\Rol;

class RolesService
{
    private $roles;

    public function __construct()
    {
        $this->roles =
            [
                Rol::$POSTULANTE => "Postulante",
                Rol::$RESPONSABLE_ADMINISTRATIVO => "Responsable Administrativo",
                Rol::$ADMINISTRADOR => "Administrador"
            ];
    }

    public function GetRoles()
    {
        return $this->roles;
    }
}
