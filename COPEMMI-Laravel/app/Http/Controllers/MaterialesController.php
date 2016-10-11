<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\material;
use App\tipo_material;
use Laracasts\Flash\Flash;
//use App\Http\Requests\materialesRequest;

class MaterialesController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $materiales = material::orderBy('COD_MATERIAL','DESC')->paginate(10);
        
        return View('Sistema')->with('materiales',$materiales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_material = tipo_material::all();

        return View('IngresarMateriales')->with('tipo_material',$tipo_material);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material=new material;
        $material->cod_material=$request->get('codigo');
        $material->cod_tipo_material=$request->get('codTipoMaterial');
        $material->nombre=$request->get('nombre');
        $material->descripcion=$request->get('descripcion');
        $material->cantidad=$request->get('cantidad');
        $material->fecha_ingreso=$request->get('fechaIngreso');

        $material->save();

        Flash("Se ha insertado el material: (".$material->nombre."), con el codigo: (".$material->cod_material.")",'success');

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
       
        $material = material::where('COD_MATERIAL',$id)->select();
        
        $tipo_material = tipo_material::all();

        return View('ModificarMateriales')->with('material',$material)->with('tipo_material',$tipo_material);
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
       dd("Se ha modificado el material".$id."");
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
       
        Flash('¡Se ha eliminado el Material con el codigo: ('.$id.') exitosamente!','danger');

        return Redirect()->route('materiales.index');
    }
}
