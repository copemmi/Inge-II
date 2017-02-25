<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\det_modelo_maquina;
class det_modelo_maquinaController extends Controller
{



 public function destroy($id, Request $request)
    {


    det_modelo_maquina::where('COD_DETALLE_MODELO',$id)->delete();
    	$message='¡Se ha eliminado el detalle número: ('.$id.') exitósamente!';
     if($request->ajax()){

     	return response()->json([
'id' => $id,
'message'=>$message

     		]);
     }

     Session:flash('message',$message);

     return Redirect()->route('materiales.index');


 }
}
