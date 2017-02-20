<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\orden_fabricacion;
use App\usuario;
use App\estado_orden;
use App\modelo_maquina;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ordenesFabricacionRequest;
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
        $tipo_estado = estado_orden::all();
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = Usuario::all();

        return View('OrdenesFabricacion/IncorporarOrdFab')->with('tipo_estado',$tipo_estado)->with('modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ordenesFabricacionRequest $request)
    {
        $orden_fabricacion=new orden_fabricacion;
//        $orden_fabricacion->cod_orden_fabricacion=$request->get('COD_ORDEN_FABRICACION');
        $orden_fabricacion->cod_estado=$request->get('COD_ESTADO');
        $orden_fabricacion->cod_modelo=$request->get('COD_MODELO');
        $orden_fabricacion->cod_usuario=$request->get('COD_USUARIO');
        $orden_fabricacion->nombre_cliente=$request->get('NOMBRE_CLIENTE');
        $orden_fabricacion->cedula_cliente=$request->get('CEDULA_CLIENTE');
        $orden_fabricacion->fecha_llegada=$request->get('FECHA_LLEGADA');
        $orden_fabricacion->fecha_entrega=$request->get('FECHA_ENTREGA');

        $orden_fabricacion->save();

        Flash("Se ha guardado la orden",'success');

        return Redirect()->route('ordenesFabricacion.create'); // Cambiar a orden de fabricacion index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $orden_fabricacion= orden_fabricacion::find($id);

        $tipo_estado = estado_orden::all();
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = Usuario::all();

        return View('OrdenesFabricacion/MostrarOrdFab')->with('OrdFab',$orden_fabricacion)->with('tipo_estado',$tipo_estado)->with('modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $orden_fabricacion= orden_fabricacion::find($id);
        
        $tipo_estado = estado_orden::all();
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = Usuario::all();

        return View('OrdenesFabricacion/ModificarOrdFab')->with('OrdFab',$orden_fabricacion)->with('tipo_estado',$tipo_estado)->with('modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orden_fabricacion= orden_fabricacion::find($id);
        $orden_fabricacion->cod_estado=$request->get('COD_ESTADO');
        $orden_fabricacion->cod_modelo=$request->get('COD_MODELO');
        $orden_fabricacion->cod_usuario=$request->get('COD_USUARIO');
        $orden_fabricacion->nombre_cliente=$request->get('NOMBRE_CLIENTE');
        $orden_fabricacion->cedula_cliente=$request->get('CEDULA_CLIENTE');
        
        $orden_fabricacion->update();

        Flash("¡Se ha modificado la orden de fabricación exitósamente!",'info');

        return Redirect()->route('modelosMaquinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        orden_fabricacion::where('COD_ORDEN_FABRICACION',$id)->delete();
       
        Flash('¡Se ha eliminado la orden de fabricación con el código: ('.$id.') exitósamente!','danger');

        return Redirect()->route('ordenesFabricacion.index');
    }
}
