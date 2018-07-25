<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Ruta Home
Route::get('/', [
	'uses' => 'HomeController@home',
	'as' => '/'
]);

// Rutas inicio sesión / registro
Route::auth();

// Mantenedor de pacientes
Route::group(['prefix' => 'pacientes', 'middleware' => ['role:user|admin']], function() {

	// Vista Index
	Route::get('/', [
		'uses' => 'PacientesController@index',
		'as' => 'pacientes.index'
	]);

	// Vista Crear
	Route::get('crear', [
		'uses' => 'PacientesController@create',
		'as' => 'pacientes.create'
	]);

	// Funcion Guardar
	Route::post('guardar', [
		'uses' => 'PacientesController@store',
		'as' => 'pacientes.store'
	]);

	// Vista Editar
	Route::get('editar/{id}', [
		'uses' => 'PacientesController@edit',
		'as' => 'pacientes.edit'
	]);

	// Funcion Editar
	Route::post('editar/{id}', [
		'uses' => 'PacientesController@update',
		'as' => 'pacientes.update'
	]);

	// Funcion Eliminar
	Route::get('eliminar/{id}', [
		'uses' => 'PacientesController@delete',
		'as' => 'pacientes.delete'
	]);
});

// Mantenedor de usuarios
Route::group(['prefix' => 'usuarios', 'middleware' => ['role:admin']], function() {

	// Vista Index
	Route::get('/', [
		'uses' => 'UsuariosController@index',
		'as' => 'usuarios.index'
	]);

	/* Vista usuario Crear
	Route::get('crear', [
		'uses' => 'UsuariosController@create',
		'as' => 'usuarios.create'
	]);

	// Funcion usuario Guardar
	Route::post('guardar', [
		'uses' => 'UsuariosController@store',
		'as' => 'usuarios.store'
	]);
	*/
	// Vista usuario Editar
	Route::get('editar/{id}', [
		'uses' => 'UsuariosController@edit',
		'as' => 'usuarios.edit'
	]);

	// Funcion usuario Editar
	Route::post('editar/{id}', [
		'uses' => 'UsuariosController@update',
		'as' => 'usuarios.update'
	]);

	// Funcion usuario Eliminar
	Route::get('eliminar/{id}', [
		'uses' => 'UsuariosController@delete',
		'as' => 'usuarios.delete'
	]);

	// Funcion Aprobar usuario
	Route::get('aprobar/{id}', [
		'uses' => 'UsuariosController@approve',
		'as' => 'usuarios.approve'
	]);


	// Funcion Exportar
	Route::get('exportar', [
		'uses' => 'UsuariosController@export',
		'as' => 'usuarios.export'
	]);
});