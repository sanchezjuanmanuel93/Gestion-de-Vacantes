<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rol::create(
            ['id' => 1, 'descripcion' => "Administrador"]
        );
        App\Rol::create(
            ['id' => 2, 'descripcion' => "Postulante"],
        );
        App\Rol::create(
            ['id' => 3, 'descripcion' => "Responsable Administrativo"],
        );
        App\Rol::create(
            ['id' => 4, 'descripcion' => "Invitado"]
        );
    }
}
