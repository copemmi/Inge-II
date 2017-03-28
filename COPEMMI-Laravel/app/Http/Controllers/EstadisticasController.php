<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\material;
use DB;
class EstadisticasController extends Controller
{
   
public function __construct()
    {
        $this->middleware('auth');
    }

public function index(Request $request)
{ 
    
      

$materiales=DB::table('materiales')->select('*')->where('CANTIDAD', '>', 20)->get();



return View('Estadisticas')->with('materiales',$materiales);


    }


    public function devuelveDatos()
    {
/*$materiales=DB::table('materiales')->select('*')->where('CANTIDAD', '>', 1)->get();*/

 /*$data=array("identificador"=>$materiales->COD_MATERIAL, "nomb" =>$materiales->NOMBRE);*/
 $materiales=DB::table('materiales')->select('COD_MATERIAL','NOMBRE','CANTIDAD')->get();
 for($i=0;$i<count($materiales);$i++)
 {


 $data[$i]=array("cod_material"=>$materiales[$i]->COD_MATERIAL,"nombre"=>$materiales[$i]->NOMBRE,"cantidad"=>$materiales[$i]->CANTIDAD);


 }
        return   json_encode($data);



}

public function devuelveDatosOrdenes()
{



$cantidadTer=Array();

for($j=1;$j<=12;$j++)
{
  if($j>=10)
  {
  $consultaTerminadas=DB::table('ordenes_fabricaciones')->where('FECHA_TERMINADA','LIKE','2017-'.$j.'%')->where('COD_ESTADO', '=', 'TER')->get();
  $consultaInactivas=DB::table('ordenes_fabricaciones')->where('FECHA_TERMINADA','LIKE','2017-'.$j.'%')->where('COD_ESTADO', '=', 'INAC')->get();

  $consultaProduccion=DB::table('ordenes_fabricaciones')->where('FECHA_TERMINADA','LIKE','2017-'.$j.'%')->where('COD_ESTADO', '=', 'PROD')->get();

  }
  else
  {
  $consultaTerminadas=DB::table('ordenes_fabricaciones')->where('FECHA_TERMINADA','LIKE','2017-0'.$j.'%')->where('COD_ESTADO', '=', 'TER')->get();

  $consultaInactivas=DB::table('ordenes_fabricaciones')->where('FECHA_TERMINADA','LIKE','2017-0'.$j.'%')->where('COD_ESTADO', '=', 'INAC')->get();

  $consultaProduccion=DB::table('ordenes_fabricaciones')->where('FECHA_TERMINADA','LIKE','2017-0'.$j.'%')->where('COD_ESTADO', '=', 'PROD')->get();
  }




$cantidadTer[$j]=count($consultaTerminadas);
$cantidadProd[$j]=count($consultaProduccion);
$cantidadInac[$j]=count($consultaInactivas);


}


for($i=0;$i<3;$i++)
{

switch($i)
{
case 0:
	$arregloPrincipal[$i]=array("eneroTer"=>$cantidadTer[1],"febreroTer"=>$cantidadTer[2],"marzoTer"=>$cantidadTer[3],"abrilTer"=>$cantidadTer[4],"mayoTer"=>$cantidadTer[5],"junioTer"=>$cantidadTer[6],"julioTer"=>$cantidadTer[7],"agostoTer"=>$cantidadTer[8],"septiembreTer"=>$cantidadTer[9],"octubreTer"=>$cantidadTer[10],"noviembreTer"=>$cantidadTer[11],"diciembreTer"=>$cantidadTer[12]);
		break;


		case 1:
$arregloPrincipal[$i]=array("eneroProd"=>$cantidadProd[1],"febreroProd"=>$cantidadProd[2],"marzoProd"=>$cantidadProd[3],"abrilProd"=>$cantidadProd[4],"mayoProd"=>$cantidadProd[5],"junioProd"=>$cantidadProd[6],"julioProd"=>$cantidadProd[7],"agostoProd"=>$cantidadProd[8],"septiembreProd"=>$cantidadProd[9],"octubreProd"=>$cantidadProd[10],"noviembreProd"=>$cantidadProd[11],"diciembreProd"=>$cantidadProd[12]);
		break;
	
	case 2:
	$arregloPrincipal[$i]=array("eneroInac"=>$cantidadInac[1],"febreroInac"=>$cantidadInac[2],"marzoInac"=>$cantidadInac[3],"abrilInac"=>$cantidadInac[4],"mayoInac"=>$cantidadInac[5],"junioInac"=>$cantidadInac[6],"julioInac"=>$cantidadInac[7],"agostoInac"=>$cantidadInac[8],"septiembreInac"=>$cantidadInac[9],"octubreInac"=>$cantidadInac[10],"noviembreInac"=>$cantidadInac[11],"diciembreInac"=>$cantidadInac[12]);
		break;
	
}

}



	return json_encode($arregloPrincipal);
}



    

}
