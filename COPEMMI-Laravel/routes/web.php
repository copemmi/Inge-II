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
//-------------------------------------
//-Ruta index de la página
//-------------------------------------
Route::get('/', 'SistemaController@showSistema');


//-------------------------------------
//-Grupo de rutas del módulo materiales
//-------------------------------------
Route::group(['prefix'=>'materiales'],function()
{
//-------------------------------------
//-Ruta Agregar Material
//-------------------------------------
Route::get('/IngresarMateriales',
	[
	'uses'=>'IngresarMaterialesController@showIngresarMateriales'
	]);

//-------------------------------------
//-Ruta Modificar Material
//-------------------------------------
Route::get('/ModificarMateriales',
	[
	'uses'=>'ModificarMaterialesController@showModificarMateriales'
	]);
});

