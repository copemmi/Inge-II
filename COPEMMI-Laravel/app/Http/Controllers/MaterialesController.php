<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\material;
use App\tipo_material;
use Laracasts\Flash\Flash;
use App\Http\Requests\materialesRequest;
use Illuminate\Support\Facades\Input;

class MaterialesController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){ 
    
      

      $check=Input::has('codTipoMaterial');
      $checkValue = Input::get('codTipoMaterial');

      switch ($checkValue){
      
          case 'nombre':
            
              $materiales=material::buscadorNombre($request->buscar)->orderBy('NOMBRE','DESC')->paginate(100);
              break;

          case 'cod':
              
              $materiales=material::buscadorCodigo($request->buscar)->orderBy('COD_MATERIAL','DESC')->paginate(100);
              break;

          case 'tipo':
             
              $materiales=material::buscadorTipo($request->buscar)->orderBy('COD_TIPO_MATERIAL','DESC')->paginate(100);
              break; 

          default:      
            $materiales=material::buscadorNombre(" ")->paginate(1);//si se le quita el paginate, no mostrara nada
      }

        return View('Materiales/Materiales')->with('materiales',$materiales);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_material = tipo_material::all();

        return View('Materiales/IngresarMateriales')->with('tipo_material',$tipo_material);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materialesRequest $request)
    {
        $material=new material;
        $material->cod_material=$request->get('COD_MATERIAL');
        $material->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
        $material->nombre=$request->get('NOMBRE');
        $material->caracteristicas=$request->get('CARACTERISTICAS');
        $material->cantidad=$request->get('CANTIDAD');
        $material->fecha_ingreso=$request->get('FECHA_INGRESO');

        $material->save();

        Flash("¡Se ha insertado el material: (".$material->nombre."), con el código: (".$material->cod_material.") exitosamente!",'success');

        return Redirect()->route('materiales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $material = material::find($id);
        
        $tipo_material = tipo_material::all();
        return View('Materiales/MostrarMateriales')->with('material',$material)->with('tipo_material',$tipo_material);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = material::find($id);
        
        $tipo_material = tipo_material::all();

        return View('Materiales/ModificarMateriales')->with('material',$material)->with('tipo_material',$tipo_material);
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
        $material = material::find($id);
        $material->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
        $material->nombre=$request->get('NOMBRE');
        $material->caracteristicas=$request->get('CARACTERISTICAS');
        $material->cantidad=$request->get('CANTIDAD');

        $material->update();

        Flash("¡Se ha modificado el material exitósamente!",'info');

        return Redirect()->route('materiales.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        material::where('COD_MATERIAL',$id)->delete();
       
        Flash('¡Se ha eliminado el material con el código: ('.$id.') exitósamente!','danger');

        return Redirect()->route('materiales.index');
    }
}