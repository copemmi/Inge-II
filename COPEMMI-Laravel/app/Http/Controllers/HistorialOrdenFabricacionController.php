<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
//Se agregan los modelos
use App\orden_fabricacion;
use App\usuario;
use App\estado_orden;
use App\modelo_maquina;
use App\cliente;
use Laracasts\Flash\Flash;
//Se agrega el request
use App\Http\Requests\historialOrdenFabricacionRequest;
use Illuminate\Support\Facades\Input;
use DB;

class HistorialOrdenFabricacionController extends Controller
{
    //Método index con el objeto request entre parámetros para el buscador
    public function index(Request $request)
    {  
    	$check=Input::has('codHistorial'); //Lo que está entre '' es la variable que está en el formulario de las vistas
        $checkValue=Input::get('codHistorial'); //Toma el valor de la variable codHistorial que está en el formulario de las vistas

        switch($checkValue) //Evalua la variable donde se guarda lo que se obtuvo de codHistorial
        {
        	case 'codorden': //Si es codorden
            $historialOrdenesFabricacion=orden_fabricacion::buscadorCodigo($request->buscar)->orderBy('COD_ORDEN_FABRICACION','DESC')->paginate(100); //Busca por el código de la orden de fabricación y si hay 2 o más resultados los ordena descendentemente
            break;

            case 'codmodelo': //Si es codmodelo
        	$historialOrdenesFabricacion=orden_fabricacion::buscadorModelo($request->buscar)->orderBy('COD_MODELO','DESC')->paginate(100); //Busca por el código del modelo y si hay 2 o más resultados los ordena descendentemente
            break;

            case 'cedula': //Si es cedula
            $historialOrdenesFabricacion=orden_fabricacion::buscadorCedulaCliente($request->buscar)->orderBy('ID','DESC')->paginate(100); //Busca por la cédula del cliente y si hay 2 o más resultados los ordena descendentemente
            break;

            default: //Por default
            $historialOrdenesFabricacion=orden_fabricacion::buscadorCodigo(" ")->paginate(1); //Si se le quita el paginate, no mostrará nada.
        }
        return View('OrdenesFabricacion/HistOrdFab')->with('historialOrdenesFabricacion', $historialOrdenesFabricacion); //Retorna la vista HistOrdFab que está en la carpeta OrdenesFabricacion
    }

    //Método show con la variable id entre parámetros para mostrar los datos al clickear un registro del buscador
    public function show($id)
    {
        $historial_orden_fabricion=orden_fabricacion::find($id); //El modelo llama al método find con el id del registro para mostrar los datos del mismo
        $clientes = DB::table('clientes')->where('ID', $historial_orden_fabricion->ID)->first(); //La variable clientes va a tener lo de la tabla clientes de la BD donde se relacionan por medio del ID
        return View('OrdenesFabricacion/MostrarHistOrdFab')->with('historial_orden_fabricion', $historial_orden_fabricion)->with('clientes', $clientes); //variableClientes es la que se usa en los formularios para agarrar los datos
        //Retorna la vista MostrarOrdFab que está en la carpeta OrdenesFabricacion
    }

    //Método edit con la variable id entre parámetros para editar una orden de fabricación
    //public function edit($id)
    //{
        //$historial_orden_fabricion=historial_orden_fabricion::find($id); //El modelo llama al método find con el id del registro para mostrar los datos del mismo
        //return View('OrdenesFabricacion/ModificarHistorial')->with('historial_orden_fabricion', $historial_orden_fabricion);
        //Retorna la vista ModificarHistorial que está en la carpeta OrdenesFabricacion
    //}

    //Método update con la variable request y id para guardar el nuevo registro en la base de datos
    //public function update(materialesRequest $request, $id)
    //{
        //$historial_orden_fabricion=historial_orden_fabricion::find($id);
        //ESTE DE ABAJO NO SE PUEDE MODIFICAR
        //$historial_orden_fabricion->cod_tipo_material=$request->get('COD_ORDEN_FABRICACION');
        //$historial_orden_fabricion->nombre=$request->get('COD_ESTADO');
        //$historial_orden_fabricion->caracteristicas=$request->get('COD_MODELO');
        //$historial_orden_fabricion->cantidad=$request->get('NOMBRE_CLIENTE');
        //$historial_orden_fabricion->cantidad=$request->get('CEDULA_CLIENTE');
        //$historial_orden_fabricion->cantidad=$request->get('FECHA_LLEGADA');
        //$historial_orden_fabricion->cantidad=$request->get('FECHA_ENTREGA');

        //$historial_orden_fabricion->update();

        //Flash("¡Se ha modificado ela orden de fabricación exitósamente!", 'info');

        //return Redirect()->route('materiales.show', $id);
    //}
}