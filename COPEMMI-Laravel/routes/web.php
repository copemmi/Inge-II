<?php

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




	Route::resource('materiales','MaterialesController');

	
	Route::get('materiales/{id}/destroy',[
		'uses' => 'MaterialesController@destroy',
		'as' => 'materiales.destroy'
		]);


	Route::resource('tipoMaterial','TipoMaterialController');

	Route::get('tipoMaterial/{id}/destroy',[
		'uses' => 'TipoMaterialController@destroy',
		'as' => 'tipoMaterial.destroy'
		]);