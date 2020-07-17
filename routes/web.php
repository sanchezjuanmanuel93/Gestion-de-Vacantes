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

Route::post('vacante/orden', 'VacanteController@publicarOrdenDeMerito')
    ->name('vacante.orden')
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$RESPONSABLE_ADMINISTRATIVO]);

Route::get('vacante/abierta', 'VacanteController@indexAbierta')
    ->name('vacante.abierta.index')
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$POSTULANTE]);

Route::resource('vacante', 'VacanteController')
    ->only([
        'index', 'create', 'store', 'show'
    ])->middleware(['passwordInitialized:' . true]);

    Route::get('/', 'InicioController@index')
->name('inicio.index')
->middleware('passwordInitialized:' . true);

Route::get('/{id}', 'InicioController@show')
->name('inicio.show')
->middleware('passwordInitialized:' . true);

Route::resource('postulacion', 'PostulacionController')
    ->only([
        'index', 'store'
    ])
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$POSTULANTE]);
Route::resource('usuario', 'UsuarioController')
    ->only([
        'index', 'create', 'store'
    ])
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$ADMINISTRADOR]);
Route::get('/soporte/faqs', 'SoporteController@index')
    ->name('soporte.faqs.index')
    ->middleware('passwordInitialized:' . true);;
Route::resource('soporte', 'SoporteController')
    ->only([
        'create', 'store'
    ])
    ->middleware('passwordInitialized:' . true);;
Route::get('/contraseña/reseteo/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')
    ->name('contraseña.reset.show');
Route::get('/contraseña/inicializar', 'InicializarContrasenaController@index')
    ->name('contraseña.inicializar.index')
    ->middleware('passwordInitialized:' . false);;
Route::post('/contraseña/inicializar', 'InicializarContrasenaController@store')
    ->name('contraseña.inicializar.store')
    ->middleware('passwordInitialized:' . false);;
Route::resource('contraseña', 'ContrasenaController')
    ->only([
        'index', 'store'
    ])
    ->middleware('passwordInitialized:' . true);;
