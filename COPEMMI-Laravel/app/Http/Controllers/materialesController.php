<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\material;
use Illuminate\Support\Facades\Redirect;
class materialesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show(){
    	return View('IngresarMateriales');
    }

    public function index()
    {
        return View('IngresarMateriales');
    }
     

//---------------------------------------
//Método para insertar materiales a la BD 
//---------------------------------------
    public function store(Request $request)
    {

    $material=new material;
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

public function edit($id)
{

   /* $material=new material::find($id);
    return View("ModificarMateriales");*/

}

public function update(Request $request)
{



}
    
    

}
