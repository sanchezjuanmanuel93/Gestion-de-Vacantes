<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(
            ['id' => Rol::$ADMINISTRADOR, 'descripcion' => "Administrador"]
        );
        Rol::create(
            ['id' => Rol::$POSTULANTE, 'descripcion' => "Postulante"],
        );
        Rol::create(
            ['id' => Rol::$RESPONSABLE_ADMINISTRATIVO, 'descripcion' => "Responsable Administrativo"],
        );
    }
}
