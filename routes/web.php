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
Route::get('/vacante', 'VacanteController@consultaListaVacantes')->name('consultar-vacantes');
Route::get('/vacante/abiertas', 'VacanteController@consultaListaVacantesAbiertas')->name('consultar-vacantes-abiertas');
Route::get('/vacante/alta', 'VacanteController@altaVacante')->name('alta-vacante');
Route::get('/postulacion', 'PostulacionController@consultaListaPostulaciones')->name('consultar-postulaciones');
Route::get('/usuario', 'UsuarioController@consultaListaUsuarios')->name('consultar-usuarios');
Route::get('/usuario/alta', 'UsuarioController@altaUsuario')->name('alta-usuario');
Route::get('/soporte', 'SoporteController@solicitarSoporte')->name('solicitar-soporte');
Route::get('/soporte/faqs', 'SoporteController@consultaFAQs')->name('consultar-faqs');
Route::get('/contraseña/reseteo/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/contraseña/cambiar', 'CambiarContrasenaController@index')->name('cambiar-contrasena-index');
Route::post('/contraseña/cambiar', 'CambiarContrasenaController@cambiar')->name('cambiar-contrasena');

