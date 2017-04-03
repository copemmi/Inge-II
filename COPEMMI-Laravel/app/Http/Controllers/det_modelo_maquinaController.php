<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\det_modelo_maquina;
class det_modelo_maquinaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


 public function destroy($id, Request $request)
    {
        $usuario_actual=\Auth::user();
    if($usuario_actual->privilegio==1){
    det_modelo_maquina::where('COD_DETALLE_MODELO',$id)->delete();
    	$message='¡Se ha eliminado el detalle número: ('.$id.') exitósamente!';
     if($request->ajax()){
     	return response()->json([
        'id' => $id,
        'message'=>$message
     		]);
         }
     Session:flash('message',$message);
     return Redirect()->route('modelosMaquina.index');
        }
        Flash("No tiene permisos para borrar",'danger');
        return Redirect()->route('modelosMaquina.index');
    }
}
