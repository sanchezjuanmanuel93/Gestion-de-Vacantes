<?php

use Illuminate\Database\Seeder;
use App\Rol;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Rol::truncate();
        Rol::create(
            ['id' => Rol::$ADMINISTRADOR, 'descripcion' => "Administrador"]
        );
        Rol::create(
            ['id' => Rol::$POSTULANTE, 'descripcion' => "Postulante"],
        );
        Rol::create(
            ['id' => Rol::$RESPONSABLE_ADMINISTRATIVO, 'descripcion' => "Responsable Administrativo"],
        );
        Rol::create(
            ['id' => Rol::$JEFE_CATEDRA, 'descripcion' => "Jefe De Cátedra"],
        );
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
