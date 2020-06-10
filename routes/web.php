<?php

use App\Rol;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'InicioController@index')
    ->name('inicio.index');
Route::get('vacante/abierta', 'VacanteController@indexAbierta')
    ->name('vacante.abierta.index')
    ->middleware('role:' . Rol::$POSTULANTE);
Route::resource('vacante', 'VacanteController')
    ->only([
        'index', 'create', 'store'
    ])
    ->middleware('role:' . Rol::$RESPONSABLE_ADMINISTRATIVO);
Route::resource('postulacion', 'PostulacionController')
    ->only([
        'index'
    ])
    ->middleware('role:' . Rol::$POSTULANTE);
Route::resource('usuario', 'UsuarioController')
    ->only([
        'index', 'create', 'store'
    ])
    ->middleware('role:' . Rol::$ADMINISTRADOR);
Route::get('/soporte/faqs', 'SoporteController@index')
    ->name('soporte.faqs.index');
Route::resource('soporte', 'SoporteController')
    ->only([
        'create', 'store'
    ]);
Route::get('/contraseña/reseteo/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')
    ->name('contraseña.reset.show');
Route::resource('contraseña', 'ContrasenaController')
    ->only([
        'index', 'store'
    ]);
