<?php

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

Route::get('/', 'InicioController@index')->name('default');
Route::get('/inicio', 'InicioController@index')->name('inicio');
Route::get('/tablero', 'TableroController@index')->name('tablero');
Route::get('vacante/abierta', 'VacanteController@indexAbierta')->name('vacante.abierta.index');
Route::resource('vacante', 'VacanteController')->only([
    'index', 'create', 'store'
]);
Route::resource('postulacion', 'PostulacionController')->only([
    'index'
]);
Route::resource('usuario', 'UsuarioController')->only([
    'index', 'create', 'store'
]);
Route::get('/soporte/faqs', 'SoporteController@index')->name('soporte.faqs.index');
Route::resource('soporte', 'SoporteController')->only([
    'create', 'store'
]);
Route::get('/contraseña/reseteo/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('contraseña.reset.show');
Route::resource('contraseña', 'ContrasenaController')->only([
    'index', 'store'
]);

