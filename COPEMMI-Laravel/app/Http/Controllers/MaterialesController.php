<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
+use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\material;
use App\tipo_material;

class MaterialesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   
    public function Index(){

    	$materiales = material::orderBy('COD_MATERIAL','DESC')->paginate(15);

    	return View('Sistema')->with('materiales',$materiales);
    }

    public function showIngresar(){

        $tipo_material = tipo_material::all();

    	return View('IngresarMateriales')->with('tipo_material',$tipo_material);
    }

    public function showModificar($id){//pasarle el id por parametro

        $tipo_material = tipo_material::all();

        $idmaterial = material::find($id);

    	return View('ModificarMateriales')->with('tipo_material',$tipo_material,$idmaterial);
    }


    //---------------------------------------
    //Método para insertar materiales a la BD 
    //---------------------------------------
    public function store(Request $request){

    $material= new material;
    $material->cod_material=$request->get('COD_MATERIAL');
    $material->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
    $material->nombre=$request->get('NOMBRE');
    $material->descripcion=$request->get('DESCRIPCION');
    $material->cantidad=$request->get('CANTIDAD');
    $material->fecha_ingreso=$request->get('FECHA_INGRESO');
  
    $material->save();
    echo "insertado con exito ";
    return View("IngresarMateriales");
    }
    //---------------------------------------
    //---------------------------------------
}
    


