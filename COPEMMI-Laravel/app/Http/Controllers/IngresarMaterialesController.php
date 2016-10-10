<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IngresarMaterialesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showIngresarMateriales(){
    	return View('IngresarMateriales');
    }
     

//---------------------------------------
//Método para insertar materiales a la BD 
//---------------------------------------
    public function store(Request $request)
    {

    $material=new material($request->all());
    $material->cod_material=$request->get('COD_MATERIAL');
    $material->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
    $material->nombre=$request->get('NOMBRE');
    $material->descripcion=$request->get('DESCRIPCION');
    $material->cantidad=$request->get('CANTIDAD');
    $material->fecha_ingreso=$request->get('FECHA_INGRESO');
    $material->save();
    return Redirect::to('materiales/IngresarMateriales');
    }
//---------------------------------------
//---------------------------------------

    
    

}
