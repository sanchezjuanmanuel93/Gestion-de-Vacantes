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
Route::get('/vacante', 'VacanteController@consultaLista')->name('consultar-vacantes');
Route::get('/vacante/alta', 'VacanteController@alta')->name('abrir-vacante');
