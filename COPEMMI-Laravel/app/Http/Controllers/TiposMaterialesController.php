<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tipo_material;
use Laracasts\Flash\Flash;
use App\Http\Requests\tipoMaterialesRequest;

class TiposMaterialesController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
    
        $tipoMaterial = tipo_material::orderBy('NOMBRE','DESC')->paginate(10);
        
        return View('TiposMateriales/TiposMateriales')->with('tipoMaterial',$tipoMaterial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $usuario_actual=\Auth::user();
        if($usuario_actual->privilegio==1){
        $tipo_material = tipo_material::all();
        return View('TiposMateriales/IngresarTiposMat')->with('tipo_material',$tipo_material);
    }
        Flash("No tiene permisos para crear tipo de material",'danger');
        return Redirect()->route('tiposMateriales.index');
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
        

        $tipoMaterial->save();

        Flash("¡Se ha insertado el tipo de material: (".$tipoMaterial->nombre."), con el código: (".$tipoMaterial->cod_tipo_material.") exitósamente!",'success');

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
     
        $tipo_material = tipo_material::find($id);
        return View('TiposMateriales/MostrarTiposMat')->with('tipoMaterial',$tipo_material);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $usuario_actual=\Auth::user();
        if($usuario_actual->privilegio==1){  
        $tipo = tipo_material::find($id);
        return View('TiposMateriales/ModificarTiposMat')->with('tipoMaterial',$tipo);
    }
        Flash("No tiene permisos para modficar tipo de material",'danger');
        return Redirect()->route('tiposMateriales.index');
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
  

        $tipoMaterial->update();

        Flash("¡Se ha modificado el tipo de material exitósamente!",'info');

        return Redirect()->route('tiposMateriales.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $usuario_actual=\Auth::user();
        if($usuario_actual->privilegio==1){
        try 
        {
            tipo_material::where('COD_TIPO_MATERIAL',$id)->delete();
       
            Flash('¡Se ha eliminado el tipo de material con el código: ('.$id.') exitósamente!','danger');

            return Redirect()->route('tiposMateriales.index');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            Flash('¡No se puede eliminar el tipo de material con el código: ('.$id.') ya que está siendo usado por un material!','danger');
            return Redirect()->route('tiposMateriales.index');
        }   
        }
            Flash('No tiene permisos para eliminar el tipo de material','danger');
            return Redirect()->route('tiposMateriales.index');
    }

}
