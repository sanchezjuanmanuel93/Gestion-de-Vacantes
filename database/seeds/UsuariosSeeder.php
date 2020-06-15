<?php

use App\Rol;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario_admin = new User();
        $usuario_admin->apellido = "Sanchez";
        $usuario_admin->nombre = "Juan manuel";
        $usuario_admin->email = "sanchezjuanm93@gmail.com";
        $usuario_admin->telefono = "3413123123";
        $usuario_admin->password = Hash::make('admin');
        $usuario_admin->password_initialized = false;
        $rol = Rol::find(Rol::$ADMINISTRADOR);
        $usuario_admin->rol()->associate($rol);
        $usuario_admin->save();

        $usuario_admin2 = new User();
        $usuario_admin2->apellido = "Selva";
        $usuario_admin2->nombre = "Ignacio";
        $usuario_admin2->email = "nacho.selva1993@gmail.com";
        $usuario_admin2->telefono = "3413123123";
        $usuario_admin2->password = Hash::make('admin');
        $usuario_admin->password_initialized = false;
        $usuario_admin2->rol()->associate($rol);
        $usuario_admin2->save();

    }
}
