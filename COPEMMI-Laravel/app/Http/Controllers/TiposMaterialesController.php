<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tipo_material;
use Laracasts\Flash\Flash;
use App\Http\Requests\tipoMaterialesRequest;

class TiposMaterialesController extends Controller
{
    //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
    

        $tipoMaterial = tipo_material::orderBy('NOMBRE','DESC')->paginate(10);
        
        return View('Materiales/TiposMateriales')->with('tipoMaterial',$tipoMaterial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_material = tipo_material::all();

        return View('Materiales/IngresarTiposMat')->with('tipo_material',$tipo_material);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoMaterialesRequest $request)
    {
        $tipoMaterial=new tipo_material;
        $tipoMaterial->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
        $tipoMaterial->nombre=$request->get('NOMBRE');
        $tipoMaterial->descripcion=$request->get('DESCRIPCION');
  

        $tipoMaterial->save();

        Flash("Se ha insertado un nuevo tipo de material: (".$tipoMaterial->nombre."), con el codigo: (".$tipoMaterial->cod_tipo_material.")",'success');

        return Redirect()->route('tiposMateriales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $tipo = tipo_material::find($id);
     

        return View('Materiales/ModificarTiposMat')->with('tipoMaterial',$tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipoMaterialesRequest $request, $id)
    {
    	
        $tipoMaterial = tipo_material::find($id);
        $tipoMaterial->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
        $tipoMaterial->nombre=$request->get('NOMBRE');
        $tipoMaterial->descripcion=$request->get('DESCRIPCION');
  

        $tipoMaterial->update();

        Flash("Se ha modificado el Tipo de material: (".$tipoMaterial->nombre.") exitosamente",'info');

        return Redirect()->route('tiposMateriales.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipo_material::where('COD_TIPO_MATERIAL',$id)->delete();
       
        Flash('¡Se ha eliminado el Tipo de Material exitosamente!','danger');

        return Redirect()->route('tiposMateriales.index');
    }

}
