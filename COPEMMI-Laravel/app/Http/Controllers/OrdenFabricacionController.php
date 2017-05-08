<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\orden_fabricacion;
use App\usuario;
use App\estado_orden;
use App\modelo_maquina;
use App\cliente;
use App\imagen_modelo;
use App\material;
use App\Notificaciones;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ordenesFabricacionRequest;
use DB;
use Illuminate\Database\Eloquent\Model;

class OrdenFabricacionController extends Controller
{ 
   public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request){ 
        $check=Input::has('Cod_BusOrd_Fab');
        $checkValue = Input::get('Cod_BusOrd_Fab');
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = usuario::all();
        $id_cliente = cliente::all();
        
      switch ($checkValue)
      {
      
          case 'estado_orden':
            
              $orden_fabricacion=orden_fabricacion::BuscadorEstadosDeOrdenes($request->buscar)->orderBy('COD_ESTADO','DESC')->paginate(100);
              break;

          case 'orden_fabricacion':
              
              $orden_fabricacion=orden_fabricacion::BuscadorOrdenFab($request->buscar)->orderBy('COD_ORDEN_FABRICACION','DESC')->paginate(100);
              break;

          case 'modelo_maquina':
             
              $orden_fabricacion=orden_fabricacion::BuscadorModMaquina($request->buscar)->orderBy('COD_MODELO','DESC')->paginate(100);
              break; 

          case 'cedula_cliente':
          $orden_fabricacion=orden_fabricacion::BuscadorCliente($request->buscar)->orderBy('ID','DESC')->paginate(100);
          break;


          default:      
            $orden_fabricacion=orden_fabricacion::BuscadorModMaquina(" ")->paginate(1);//si se le quita el paginate, no mostrara nada
      }

                 return view('OrdenesFabricacion/OrdenesFabricacion')->with('ordenFab',$orden_fabricacion)->with('modelo_maquina',$tipo_modelo)->with('cedula_cliente',$id_cliente)->with('tipo_usuario',$tipo_usuario);
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
        $tipo_estado = estado_orden::where('COD_ESTADO','!=',"TER")->get();
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = Usuario::all();
        $id_cliente = cliente::all();


        return View('OrdenesFabricacion/IncorporarOrdFab')->with('tipo_estado',$tipo_estado)->with('modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario)->with('cliente',$id_cliente);
    }
      Flash("No tiene permisos para crear órdenes de fabricación",'danger');  
        return Redirect()->route('notificaciones.index');
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ordenesFabricacionRequest $request)
    {
        $orden_fabricacion=new orden_fabricacion;
        $orden_fabricacion->cod_estado=$request->get('COD_ESTADO');
        $orden_fabricacion->cod_modelo=$request->get('COD_MODELO');
        $orden_fabricacion->cod_usuario=$request->get('COD_USUARIO');
        $orden_fabricacion->id=$request->get('ID');
        $orden_fabricacion->fecha_llegada=$request->get('FECHA_LLEGADA');
        $orden_fabricacion->fecha_entrega=$request->get('FECHA_ENTREGA');
        $orden_fabricacion->fecha_terminada=$request->get('FECHA_ENTREGA');

        $orden_fabricacion->save();

        // $detalleMat contiene el código y la cantidad de los materiales de un modelo de máquina.  
        $detalleMat = DB::table('det_modelos_maquinas')->select('COD_MATERIAL','CANTIDAD')->where('COD_MODELO',$orden_fabricacion->cod_modelo)->get(); 
        
        // $tipoEstado contiene la fila que tiene el código PROD de la tabla ordenes_fabricaciones. 
        $tipo_estado = DB::table('estados_ordenes')->where('COD_ESTADO','PROD')->value('COD_ESTADO');

        // Se realiza un ciclo que recorra todos los detalles de modelos.
        foreach($detalleMat as $det)
        {   
            if($orden_fabricacion->cod_estado==$tipo_estado)
            {
                $material = material::find($det->COD_MATERIAL); //$material guarda el código del material.
                $material->cantidad=$material->CANTIDAD-$det->CANTIDAD;
                $material->update();
            } 
        } 

        //Notificaciones. 
        $notificaciones = new Notificaciones(); 
        if($material->CANTIDAD <= 0 || $material->CANTIDAD <= $material->CANTIDADMINIMA) {
            $notificaciones->tipo = 'Material';
       }else {
           $notificaciones->tipo = 'Orden de Fabricación';  
       }
        
        if($material->CANTIDAD <= 0 || $material->CANTIDAD <= $material->CANTIDADMINIMA) {
            $notificaciones->mensaje='¡Se ha acabado la cantidad de material!';
       }else {
           $notificaciones->mensaje='¡Se ha insertado una orden de fabricación exitósamente!';  
       }

        $notificaciones->save(); 

        Flash("¡Se ha insertado una orden de fabricación exitósamente!",'success');return Redirect()->route('ordenesFabricacion.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $orden_fabricacion= orden_fabricacion::find($id);

        $tipo_estado = estado_orden::all();
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = usuario::all();
        $id_cliente=cliente::all();
        $modelos = modelo_maquina::find($orden_fabricacion->COD_MODELO);
        $imagen = DB::table('imagenes_modelos')->where('COD_IMAGEN', $modelos->COD_IMAGEN)->first();


          return View('OrdenesFabricacion/MostrarOrdFab')->with('orden_fabricacion',$orden_fabricacion)->with('tipo_estado',$tipo_estado)->with('modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario)->with('cliente',$id_cliente)->with('ima',$imagen);
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
        $orden_fabricacion= orden_fabricacion::find($id);
        $tipo_estado = estado_orden::all();
        $tipo_modelo = modelo_maquina::all();
        $tipo_usuario = Usuario::all();
        $id_cliente = cliente::all();
        return View('OrdenesFabricacion/ModificarOrdFab')->with('OrdFab',$orden_fabricacion)->with('tipo_estado',$tipo_estado)->with('modelo',$tipo_modelo)->with('tipo_usuario',$tipo_usuario)->with('cliente',$id_cliente);
    }
          Flash("No tiene permisos para modificar órdenes de fabricación",'danger');  
        return Redirect()->route('ordenesFabricacion.index');
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
        $orden_fabricacion= orden_fabricacion::find($id);
        $orden_fabricacion->cod_estado=$request->get('COD_ESTADO');
        $orden_fabricacion->cod_modelo=$request->get('COD_MODELO');
        $orden_fabricacion->cod_usuario=$request->get('COD_USUARIO');
        $orden_fabricacion->id=$request->get('ID');
        
        $orden_fabricacion->update();

        /*Se restan los materiales cuándo una órden de fabricación se pone en producción*/ 

        // $detalleMat contiene el código y la cantidad de los materiales de todos los módelos de máquinas. 
        $detalleMat = DB::table('det_modelos_maquinas')->select('COD_MATERIAL','CANTIDAD')->where('COD_MODELO',$orden_fabricacion->cod_modelo)->get(); 
        
        // $tipoEstado contiene la fila que tiene el código PROD de la tabla ordenes_fabricaciones. 
        $tipo_estado = DB::table('estados_ordenes')->where('COD_ESTADO','PROD')->value('COD_ESTADO');

         // Se realiza un ciclo que recorra todos los detalles de modelos.
        foreach($detalleMat as $det)
        {  
            if($orden_fabricacion->cod_estado==$tipo_estado)
            {
                $material = material::find($det->COD_MATERIAL); //$material guarda el código del material.\
                $material->cantidad=$material->CANTIDAD-$det->CANTIDAD;
                $material->update();
            }
        } 

        //Notificaciones. 
        $notificaciones = new Notificaciones(); 
        if($material->CANTIDAD <= 0 || $material->CANTIDAD <= $material->CANTIDADMINIMA) {
            $notificaciones->tipo = 'Material';
       }else {
           $notificaciones->tipo = 'Orden de Fabricación';  
       }
        
        if($material->CANTIDAD <= 0 || $material->CANTIDAD <= $material->CANTIDADMINIMA) {
            $notificaciones->mensaje='¡Se ha acabado la cantidad de material!';
       }else {
           $notificaciones->mensaje='¡Se ha insertado una orden de fabricación exitósamente!';  
       }

        $notificaciones->save(); 
        
        Flash("¡Se ha modificado la órden de fabricación exitósamente!",'info');
        return Redirect()->route('ordenesFabricacion.index');
    }

    public function cambiar_estados($id){
         $usuario_actual=\Auth::user();
        if($usuario_actual->privilegio==1){
        
        /*$orden_fabricacion=orden_fabricacion::find($id);
        $est="TER";
        $orden_fabricacion->cod_estado=$est;
        $orden_fabricacion->store();
        return ("Se ha actualizado el estado de la órden de fabricación");*/
        return("Si sirve");
           }
               
        Flash("No tiene permisos para eliminar órdenes de fabricación",'danger');  
        return Redirect()->route('ordenesFabricacion.index');
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
        orden_fabricacion::where('COD_ORDEN_FABRICACION',$id)->delete();
        Flash('¡Se ha eliminado la orden de fabricación con el código: ('.$id.') exitósamente!','danger');
        return Redirect()->route('ordenesFabricacion.index');
        }
          Flash("No tiene permisos para eliminar órdenes de fabricación",'danger');  
        return Redirect()->route('ordenesFabricacion.index');
}
}