<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\orden_fabricacion;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

class OrdenFabricacionController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request){ 

         return View('OrdenesFabricacion/IncorporarOrdFab');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $tipo_estado = tipo_estado::all();
        $tipo_modelo = tipo_modelo::all();
        $tipo_usuario = tipo_usuario::all();

        //return View('OrdenesFabricacion/IncorporarOrdFab')->with('tipo_estado',$tipo_estado)->with('tipo_modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario);
        return View('OrdenesFabricacion/IncorporarOrdFab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orden_fabricacion=new orden_fabricacion;
        $orden_fabricacion->cod_orden_fabricacion=$request->get('COD_ORDEN_FABRICACION');
        $orden_fabricacion->cod_estado=$request->get('COD_ESTADO');
        $orden_fabricacion->cod_modelo=$request->get('COD_MODELO');
        $orden_fabricacion->cod_usuario=$request->get('COD_USUARIO');
        $orden_fabricacion->nombre_cliente=$request->get('NOMBRE_CLIENTE');
        $orden_fabricacion->cedula_cliente=$request->get('CEDULA_CLIENTE');
        $orden_fabricacion->fecha_llegada=$request->get('FECHA_LLEGADA');
        $orden_fabricacion->fecha_entrega=$request->get('FECHA_ENTREGA');

        $orden_fabricacion->save();

        Flash("Se ha guardado la orden: (".$orden_fabricacion->cod_orden_fabricacion."), del cliente: (".$cod_orden_fabricacion->nombre_cliente.")",'success');

        return Redirect()->route('ordenFabricacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $orden_fabricacion = orden_fabricacion::find($id);
        
        $estado= estado_orden::all();
        $modelos= modelo_maquina::all();
        return View('ModelosMaquinas/MostrarMateriales')->with('estado',$estado_orden)->with('modelos',$modelo_maquina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(materialesRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
