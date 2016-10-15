<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tipo_material;

class TipoMaterialController extends Controller
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
        
        return View('InicioTipoMateriales')->with('tipoMaterial',$tipoMaterial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_material = tipo_material::all();

        return View('IngresarTipoMaterial')->with('tipo_material',$tipo_material);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoMaterial=new tipo_material;
        $tipoMaterial->cod_tipo_material=$request->get('codigo');
        $tipoMaterial->nombre=$request->get('nombre');
        $tipoMaterial->descripcion=$request->get('descripcion');
  

        $tipoMaterial->save();

        Flash("Se ha insertado un nuevo tipo de material: (".$tipoMaterial->nombre."), con el codigo: (".$tipoMaterial->cod_tipo_material.")",'success');

        return Redirect()->route('tipoMaterial.index');
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
     

        return View('ModificarTiposMateriales')->with('tipoMaterial',$tipo);
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
    	
        $tipoMaterial = tipo_material::find($id);
        $tipoMaterial->cod_tipo_material=$request->get('codigo');
        $tipoMaterial->nombre=$request->get('nombre');
        $tipoMaterial->descripcion=$request->get('descripcion');
  

        $tipoMaterial->update();

        Flash("Se ha modificado el material: (".$tipoMaterial->nombre.") exitosamente",'info');

        return Redirect()->route('tipoMaterial.index');

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
       
        Flash('¡Se ha eliminado el Material con el codigo: ('.$id.') exitosamente!','danger');

        return Redirect()->route('tipoMaterial.index');
    }

















}
