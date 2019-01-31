<?php

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/', function () {
    return view('adminlte::auth.login');
});*/

//Route::resource('academia', 'AcademiaController');
Route::group(['prefix' => 'academia'], function () {
	Route::get('/', 'AcademiaController@index')->name('academia.index');
	Route::get('inscripcion/prueba', 'AcademiaController@inscripcionprueba')->name('academia.inscripcion_prueba');
	Route::get('inscripcion/', 'AcademiaController@inscripcionacademia')->name('academia.inscripcion');
});

Route::resource('servicios', 'ServiciosController');

Route::resource('atleta', 'AtletaController');

Route::resource('vacacional', 'VacacionalController');

Route::resource('campamento', 'CampamentoController');
Route::group(['prefix' => 'campamento'], function () {
	Route::get('registro/{campamento_id}', 'CampamentoController@registro')->name('campamento.registro');
});

Route::resource('torneo', 'TorneoController');

Route::resource('alquiler', 'AlquilerController');
Route::group(['prefix' => 'alquiler'], function () {
	Route::get('reserva/buscar-disponibilidad', 'AlquilerController@buscardisponibilidad')->name('alquiler.disponibilidad');
});

Route::group(['prefix' => 'registro'], function () {
	Route::get('/', 'RegistroController@index')->name('registro.index');
	Route::post('/', 'RegistroController@store')->name('registro.store');
	Route::get('{tipo}', 'RegistroController@registroatleta')->name('registro.atleta');
});

Route::group(['middleware' => 'auth'], function () {

    Route::resource('usuarios', 'UserController');

	Route::group(['prefix' => 'usuarios'], function () {
		Route::get('eliminar/{usuario}', 'UserController@destroy')->name('usuarios.borrar');
		Route::get('table/listado', 'UserController@list')->name('usuarios.listado');
	});

});