<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tipo_modelo;
use Laracasts\Flash\Flash;
use App\Http\Requests\tipoModelosRequest; //Hacer el request de tipo de modelos. 

class TiposModMaqController extends Controller
{
	   //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function index(Request $request)
    {
    	$tipoModelo = tipo_modelo::orderBy('NOMBRE','DESC')->paginate(10);
        
        return View('TiposModelosMaquinas/TiposModelos')->with('tipoModelo',$tipoModelo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_modelo = tipo_modelo::all();

        return View('TiposModelosMaquinas/IngresarTiposModMaq')->with('tipo_modelo',$tipo_modelo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoModelosRequest $request)
    {
        $tipoModelo=new tipo_modelo;
        $tipoModelo->cod_tipo_modelo=$request->get('COD_TIPO_MODELO');
        $tipoModelo->nombre=$request->get('NOMBRE');
        

        $tipoModelo->save();

        Flash("¡Se ha insertado el tipo de modelo de máquina: (".$tipoModelo->nombre."), con el código: (".$tipoModelo->cod_tipo_modelo.") exitósamente!",'success');

        return Redirect()->route('tiposModelosMaquinas.index');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $tipo_modelo = tipo_modelo::find($id);
        return View('TiposModelosMaquinas/MostrarTiposModMaq')->with('tipoModelo',$tipo_modelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $tipo = tipo_modelo::find($id);
     

        return View('TiposModelosMaquinas/ModificarTiposModMaq')->with('tipoModelo',$tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipoModelosRequest $request, $id)
    {
        
        $tipoModelo = tipo_modelo::find($id);
        $tipoModelo->cod_tipo_modelo=$request->get('COD_TIPO_MODELO');
        $tipoModelo->nombre=$request->get('NOMBRE');
  

        $tipoModelo->update();

        Flash("¡Se ha modificado el tipo del modelo de máquina exitósamente!",'info');

        return Redirect()->route('tiposModelosMaquinas.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipo_modelo::where('COD_TIPO_MODELO',$id)->delete();
       
        Flash('¡Se ha eliminado el tipo de modelo de máquina con el código: ('.$id.') exitósamente!','danger');

        return Redirect()->route('tiposModelosMaquinas.index');
    }

}