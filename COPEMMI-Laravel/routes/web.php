<?php
use Illuminate\Support\Facades\Input;
use App\Notifications\Notificaciones;

Auth::loginUsingId(1);

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



//-----------------------------------------------------------------RUTAS PARA EL ACERCA DE
	Route::get('equipoTrabajo',['as' => 'equipoTrabajo.index', function(){return View('EquipoTrabajo');}]);
	Route::get('equipoDesarrollo',['as' => 'equipoDesarrollo.index', function(){return View('EquipoDesarrollo');}]);



//--------------------------------------------------------------------RUTAS MATERIALES
	Route::resource('materiales','MaterialesController');
	
	Route::get('materiales/{id}/destroy',[
		'uses' => 'MaterialesController@destroy',
		'as' => 'materiales.destroy'
		]);


//-------------------------------------------------------------------RUTAS TIPOS DE MATERIAL
	Route::resource('tiposMateriales','TiposMaterialesController');

	Route::get('tiposMateriales/{id}/destroy',[
		'uses' => 'TiposMaterialesController@destroy',
		'as' => 'tiposMateriales.destroy'
		]);


//-------------------------------------------------------------------RUTAS MODELOS DE MÁQUINAS
	Route::resource('modelosMaquinas','ModelosMaquinasController');
	
	//recibe 3 parametros, el cod para eliminar el modelo, el cod para eliminar la imagen en la base y la URL para eliminar la imagen del sistema de archivos
	Route::get('modelosMaquinas/{id}/{idImagen}/{urlImagen}/destroy',[ 
		'uses' => 'ModelosMaquinasController@destroy',
		'as' => 'modelosMaquinas.destroy'
		]);

	Route::put('modelosMaquinas/{id}/{idImagen}/{urlImagen}/update',[ 
		'uses' => 'ModelosMaquinasController@update',
		'as' => 'modelosMaquinas.update'
		]);



//--------------------------------------------------------------------RUTAS TIPOS DE MODELOS DE MÁQUINAS
	Route::resource('tiposModelosMaquinas','TiposModMaqController');

	Route::get('tiposModelosMaquinas/{id}/destroy',[
		'uses' => 'TiposModMaqController@destroy',
		'as' => 'tiposModelosMaquinas.destroy'
		]);
		

//--------------------------------------------------------------------RUTAS DE ORDENES DE FABRICACIÓN

	Route::resource('ordenesFabricacion','OrdenFabricacionController');

	Route::get('ordenesFabricacion/{id}/destroy',[
		'uses' => 'OrdenFabricacionController@destroy',
		'as' => 'ordenesFabricacion.destroy'
		]);

	Route::get('ordenesFabricacion/{id}/cambiar_estados',[
		'uses' => 'OrdenFabricacionController@cambiar_estados',
		'as'=>'ordenesFabricacion.cambiar_estados'
		]);

	//--------------------------------------------------------------------RUTAS DE DET_MODELO_MAQUINA

	
	Route::resource('det_modelo_maquina','det_modelo_maquinaController');
	
	Route::get('det_modelo_maquina/{id}/destroy','det_modelo_maquinaController@destroy');
//---------------------------------------------------------------------RUTAS DE CLIENTES
	
	Route::resource('clientes','ClientesController');

	Route::get('clientes/{id}/destroy',[
		'uses' => 'ClientesController@destroy',
		'as' => 'clientes.destroy'
		]);
//-------------------------RUTAS PARA EL HISTORIAL DE ÓRDENES DE FABRICACIÓN TERMINADAS-------------------------
	Route::resource('historialOrdenesFabricacion','HistorialOrdenFabricacionController'); //Se llama en el navegador como http://localhost:8000/historialOrdenesFabricacion, además se va a usar el controlador indicado

	Route::get('historialOrdenesFabricacion/{id}/destroy', [
	'uses' => 'HistorialOrdenFabricacionController@destroy', //La ruta va a usar el controlador indicado, lo que está luego del @ es el método que se va a usar de dicho controlador.
	'as' => 'historialOrdenesFabricacion.destroy' //Este va a ser el nombre de la ruta aunque no es necesario
	]);
	
	Route::get('OrdenesFabricacion/terminadas',[
	'uses' => 'HistorialOrdenFabricacionController@terminadas',
	'as' => 'historialOrdenesFabricacion.terminadas'
	]);

	Route::get('traerDatos/{id}','HistorialOrdenFabricacionController@TraerDatos');//ruta para traer los datos de la orden de fabricacion

//-------------------------RUTAS PARA LAS INSERTAR CON AJAX-------------------------//
	Route::get('ruta_tipo/{id}', 'MaterialesController@actualizaComboTipoMat');//Ruta para hacer el combobox con ajax
	Route::get('guardarTipoMat/{cod}/{nomb}', 'MaterialesController@guardarTipoMat');//Ruta para hacer el insert de tipo de material con ajax


Route::get('ruta_tipoMod/{id}','ModelosMaquinasController@actualizaComboTipoModMaq');//Ruta para hacer el combobox con ajax		
 	Route::get('guardarTipoModMaq/{cod}/{nomb}', 'ModelosMaquinasController@guardarTipoModMaq');//Ruta para hacer el insert de tipo de modelo de la maquina con ajax		
 		
 	Route::get('ruta_tipoClientes/{ids}', 'ClientesController@actualizaComboClientes');//Ruta para hacer el combobox con ajax		
 	Route::get('guardarClientes/{id}/{nomb}/{ape1}/{ape2}/{dir}/{tel}/{email}/{nombEmp}/{cedJud}', 'ClientesController@guardarClientes');//Ruta para hacer el insert clientes con ajax


//-----------RUTAS PARA CAMBIAR ESTADO CON AJAX-----------------------------//
 Route::get('ruta_cambiarEstado/{id}','OrdenFabricacionController@cambiar_estados');	;

//-------------------------RUTAS PARA LAS ESTADISTICAS-------------------------
Route::resource('estadisticas','EstadisticasController'); 

Route::get('traeDatos','EstadisticasController@devuelveDatos');

Route::get('traeDatosOrdenes','EstadisticasController@devuelveDatosOrdenes');

//----RUTAS PARA EL LOGIN----
	
Route::get('/',function(){
	return view('Auth/login');
});

Route::Auth();

//Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

//-------------------------RUTAS PARA LAS NOTIFICACIONES-------------------------//

//Recibe como parámetro el nombre de la ruta y el controlador donde se definen todas las rutas. 
Route::resource('notificaciones','NotificacionesController@index'); //Toma los métodos del controlador y los define como un estilo de rutas. resource toma cada uno de los métodos y genera las rutas.

/*Route::get('/notificaciones', function(){
	Flashy::message('Welcome Aboard!', 'http://your-awesome-link.com');
	return view('Notificaciones/Notificaciones');
});*/ 

/*Route::get('notificaciones', function() {
	echo "esta es la seccion de articulos";
});*/

//METODO PARA REDIRIGIR A UNA VISTA ESPECIFICA EN CASO DE QUE EL URL NO EXISTA
Route::get('/{slug?}','MaterialesController@index');
