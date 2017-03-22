<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\material;
use DB;
class EstadisticasController extends Controller
{
   

public function index(Request $request)
{ 
    
      

$materiales=DB::table('materiales')->select('*')->where('CANTIDAD', '>', 20)->get();



return View('Estadisticas')->with('materiales',$materiales);


    }


    public function devuelveDatos()
    {
/*$materiales=DB::table('materiales')->select('*')->where('CANTIDAD', '>', 1)->get();*/

 /*$data=array("identificador"=>$materiales->COD_MATERIAL, "nomb" =>$materiales->NOMBRE);*/
 $materiales=DB::table('materiales')->select('*')->get();
 for($i=0;$i<count($materiales);$i++)
 {


 $data[$i]=array("cod_material"=>$materiales[$i]->COD_MATERIAL,"nombre"=>$materiales[$i]->NOMBRE,"cantidad"=>$materiales[$i]->CANTIDAD);


 }
        return   json_encode($data);
return "llego bien";


    }




    public function actualizaGraficos($valor)
    {
return $valor;


    }











}
