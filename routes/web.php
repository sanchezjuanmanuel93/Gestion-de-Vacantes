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

Route::put('usuario/recuperar/{id}', 'UsuarioController@recuperar')
    ->name('usuario.recuperar')
    ->middleware(['userSoftDeleted','passwordInitialized:' . true, 'role:' . Rol::$ADMINISTRADOR]);

Route::resource('usuario', 'UsuarioController')
    ->only([
        'index', 'create', 'store', 'show', 'update', 'destroy'
    ])
    ->middleware(['userSoftDeleted','passwordInitialized:' . true, 'role:' . Rol::$ADMINISTRADOR]);

Route::get('/postulacion/descargarCV/{id}', 'PostulacionController@descargarCV')
    ->name('postulacion.descargarCV')
    ->middleware(['userSoftDeleted','passwordInitialized:' . true, 'role:' . Rol::$RESPONSABLE_ADMINISTRATIVO]);

Route::resource('postulacion', 'PostulacionController')
    ->only([
        'index', 'store'
    ])
    ->middleware(['userSoftDeleted','passwordInitialized:' . true, 'role:' . Rol::$POSTULANTE]);

Route::get('/soporte/faqs', 'SoporteController@indexFaqs')
    ->name('soporte.faqs.index')
    ->middleware(['userSoftDeleted','passwordInitialized:' . true]);

Route::resource('soporte', 'SoporteController')
    ->only([
        'index', 'create', 'store'
    ])
    ->middleware(['userSoftDeleted','passwordInitialized:' . true]);

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
    ->middleware('passwordInitialized:' . true);

Route::post('vacante/orden', 'VacanteController@publicarOrdenDeMerito')
    ->name('vacante.orden')
    ->middleware(['userSoftDeleted','passwordInitialized:' . true, 'role:' . Rol::$RESPONSABLE_ADMINISTRATIVO]);

Route::get('vacante/abierta', 'VacanteController@indexAbierta')
    ->name('vacante.abierta.index')
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$POSTULANTE]);

Route::put('vacante/cerrarAnticipadamente/{id}', 'VacanteController@cerrarAnticipadamente')
    ->name('vacante.cerrarAnticipadamente')
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$RESPONSABLE_ADMINISTRATIVO]);

Route::get('vacante', 'VacanteController@index')
    ->name('vacante.index')
    ->middleware(['passwordInitialized:' . true, 'role:' . Rol::$RESPONSABLE_ADMINISTRATIVO]);

Route::resource('vacante', 'VacanteController')
    ->only([
        'create', 'store', 'show', 'update'
    ])->middleware(['userSoftDeleted','passwordInitialized:' . true]);    

Route::get('/{id}', 'InicioController@show')
    ->name('inicio.show')
    ->middleware(['userSoftDeleted','passwordInitialized:' . true]);

Route::get('/', 'InicioController@index')
    ->name('inicio.index')
    ->middleware('passwordInitialized:' . true);
