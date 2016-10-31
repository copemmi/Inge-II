
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


// Rutas para el Acerca de
	Route::get('equipoTrabajo',['as' => 'equipoTrabajo.index', function(){return View('EquipoTrabajo');}]);
	Route::get('equipoDesarrollo',['as' => 'equipoDesarrollo.index', function(){return View('EquipoDesarrollo');}]);


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
		
		//Rutas de Ordenes de Fabricacion

	Route::resource('ordenesFabricacion','OrdenFabricacionController');

	Route::get('ordenesFabricacion/{id}/destroy',[
		'uses' => 'OrdenFabricacionController@destroy',
		'as' => 'ordenesFabricacion.destroy'
		]);



	

