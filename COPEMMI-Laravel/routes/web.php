
<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




//Rutas Materiales
	Route::resource('materiales','MaterialesController');
	
	Route::get('materiales/{id}/destroy',[
		'uses' => 'MaterialesController@destroy',
		'as' => 'materiales.destroy'
		]);

//Rutas Tipos de Material
	Route::resource('tiposMateriales','TiposMaterialesController');

	Route::get('tiposMateriales/{id}/destroy',[
		'uses' => 'TiposMaterialesController@destroy',
		'as' => 'tiposMateriales.destroy'
		]);

//Rutas de Modelos de Máquinas
	Route::resource('modelosMaquinas','ModelosMaquinasController');
	
	Route::get('modelosMaquinas/{id}/destroy',[
		'uses' => 'ModelosMaquinasController@destroy',
		'as' => 'modelosMaquinas.destroy'
		]);

//Rutas de Tipos de Modelos de Máquinas
	Route::resource('tiposModelosMaquinas','TiposModMaqController');

	Route::get('tiposModelosMaquinas/{id}/destroy',[
		'uses' => 'TiposModMaqController@destroy',
		'as' => 'tiposModelosMaquinas.destroy'
		]);

// Rutas para el Acerca de
	Route::get('equipoTrabajo',[
		'uses' => 'EquipoTrabajoController@index',
		'as' => 'equipoTrabajo.index'
		]);

	Route::get('equipoDesarrollo',[
		'uses' => 'EquipoDesarrolloController@index',
		'as' => 'equipoDesarrollo.index'
		]);

