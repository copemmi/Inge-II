<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\det_modelo_maquina;
use App\modelo_maquina;
use App\tipo_modelo;
use App\imagen_modelo;
use App\material;
use Laracasts\Flash\Flash;
use App\Http\Requests\modelosMaquinasRequest;
use Illuminate\Support\Facades\Input;
use DB;
use File;

class ModelosMaquinasController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
    /*$modelos=modelo_maquina::orderBy('COD_MODELO','DESC')->paginate(100);
      return view('ModelosMaquinas/ModelosMaquinas')->with('modelos',$modelos);*/
     $check=Input::has('codBusquedaMod');
      $checkValue = Input::get('codBusquedaMod');

      switch ($checkValue)
      {
      
          case 'nombre':
            
              $modelos=modelo_maquina::buscadorNombre($request->buscar)->orderBy('NOMBRE','DESC')->paginate(100);
              break;

          case 'cod':
              
              $modelos=modelo_maquina::buscadorCodigo($request->buscar)->orderBy('COD_MODELO','DESC')->paginate(100);
              break;

          case 'tipo':
             
              $modelos=modelo_maquina::buscadorTipo($request->buscar)->orderBy('COD_TIPO_MODELO','DESC')->paginate(100);
              break; 

          case 'precio':
              $modelos=modelo_maquina::buscadorPrecio($request->buscar)->orderBy('PRECIO','DESC')->paginate(100);
          break;


          default:      
            $modelos=modelo_maquina::buscadorNombre(" ")->paginate(1);//si se le quita el paginate, no mostrara nada
      }

                 return view('ModelosMaquinas/ModelosMaquinas')->with('modelos',$modelos);

      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_modelo = tipo_modelo::all();
        $material=material::all();

        return View('ModelosMaquinas/IngresarModMaq')->with('tipo_modelo',$tipo_modelo)->with('material', $material);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(modelosMaquinasRequest $request)
    {


    try{
      //guardar la imagen
      $imagen_modelo=new imagen_modelo;
      $imagen_modelo->cod_imagen=$request->get("COD_IMAGEN");//codigo de la imagen

        if(Input::hasFile('IMAGEN')){
          $file=Input::file('IMAGEN');
          $file->move(public_path().'/imagenes/ModelosMaquinas/',$file->getClientOriginalName());//obtenemos el nombre y guardamos la imagen en esa ruta
          $imagen_modelo->imagen=$file->getClientOriginalName();//se guarda el nombre de la imagen en la BD
        }

      $imagen_modelo->save();
    }
    catch (\Illuminate\Database\QueryException $e)
    {
            Flash('¡El nombre de la imagen es muy grande, por favor cambielo!','danger');
            return Redirect()->route('modelosMaquinas.index');
    } 

      //guardar el modelo
      $modelo_maquina=new modelo_maquina;
      $modelo_maquina->cod_modelo=$request->get('COD_MODELO');
      $modelo_maquina->cod_imagen=$imagen_modelo->cod_imagen;//codigo de la imagen
      $modelo_maquina->cod_tipo_modelo=$request->get('COD_TIPO_MODELO');
      $modelo_maquina->nombre=$request->get('NOMBRE');
      $modelo_maquina->caracteristicas=$request->get('CARACTERISTICAS');
      $modelo_maquina->precio=$request->get('PRECIO');

      $modelo_maquina->save();


      //guardar el detalle del modelo
      $cont=0;

      $idmaterial=$request->get('idmaterial');
      $cantidad=$request->get('cantidad');

      while($cont < count($idmaterial)){

        $det_modelo_maquina= new det_modelo_maquina;
        $det_modelo_maquina->cod_modelo=$modelo_maquina->cod_modelo;
        $det_modelo_maquina->cod_material=$idmaterial[$cont];
        $det_modelo_maquina->cantidad=$cantidad[$cont];

        $det_modelo_maquina->save();

        $cont++;
      }


      Flash("¡Se ha insertado el modelo exitosamente!",'success');

      return Redirect()->route('modelosMaquinas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $modelos = modelo_maquina::find($id);
       
       $tipo_modelo = tipo_modelo::all();
       $imagenes = DB::table('imagenes_modelos')->where('COD_IMAGEN', $modelos->COD_IMAGEN)->first();
      
       $materialesDetalle=det_modelo_maquina::detalleMaterialModelo($modelos->COD_MODELO)->orderBy('COD_DETALLE_MODELO','DESC')->paginate(100);
     
       return View('ModelosMaquinas/MostrarModMaq')->with('modelos',$modelos)->with('tipo_modelo',$tipo_modelo)->with('ima',$imagenes)->with('materialesDetalle',$materialesDetalle);  
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*Controlador para modificar los modelos de las máquinas*/ 
    public function edit($id)
    {
        $modelos = modelo_maquina::find($id); //Tenemos los datos de los modelos que queremos editar. 

        $tipo_modelo = tipo_modelo::all(); 

        $imagenes = DB::table('imagenes_modelos')->where('COD_IMAGEN', $modelos->COD_IMAGEN)->first();

        $materialesDetalle=det_modelo_maquina::detalleMaterialModelo($modelos->COD_MODELO)->orderBy('COD_DETALLE_MODELO','DESC')->paginate(100);

        return view('ModelosMaquinas/ModificarModMaq')->with('modelos',$modelos)->with('tipo_modelo', $tipo_modelo)->with('ima',$imagenes)->with('materialesDetalle',$materialesDetalle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(modelosMaquinasRequest $request, $id, $idImagen, $urlImagen)
    {
        $modelos = modelo_maquina::find($id);
        $modelos->cod_tipo_modelo=$request->get('COD_TIPO_MODELO');
        $modelos->cod_imagen=$request->get('COD_IMAGEN');
        $modelos->nombre=$request->get('NOMBRE');
        $modelos->caracteristicas=$request->get('CARACTERISTICAS');
        $modelos->precio=$request->get('PRECIO');

        $modelos->update();


        if(Input::hasFile('IMAGEN')){

          $imagen_modelo = imagen_modelo::find($idImagen); 
          $file=Input::file('IMAGEN');
          $file->move(public_path().'/imagenes/ModelosMaquinas/',$file->getClientOriginalName());//obtenemos el nombre y guardamos la imagen en esa ruta
          $imagen_modelo->imagen=$file->getClientOriginalName();//se guarda el nombre de la imagen en la BD
          $imagen_modelo->update();

          File::delete(public_path().'/imagenes/ModelosMaquinas/'.$urlImagen);//elimina la imagen antigua en el Sistema de Archivos

        }

        //Detalle del Modelo de la Máquina.

        $cont=0;

        //Variables de los Materiales. 
        $idDetalle=$request->get('detalle'); 
        $cantidad=$request->get('cantidad');

        while($cont < count($idDetalle)) { //Recorre todos los materiales que están en el detalle. 

          //$det_modelo_maquina= new det_modelo_maquina; //Instancio un objeto detalle del modelo para enviarle todos los valores. 
          $materialesDetalle = det_modelo_maquina::find($idDetalle[$cont]);
          //$det_modelo_maquina->cod_modelo=$modelo_maquina->cod_modelo;
          //$det_modelo_maquina->cod_material=$idmaterial[$cont];
          $materialesDetalle->cantidad=$cantidad[$cont];

          $materialesDetalle->update();

          $cont++;
        }  

        Flash("¡Se ha modificado el modelo de la máquina exitósamente!",'info');

        return Redirect()->route('modelosMaquinas.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , $idImagen, $urlImagen)
    {
        try 
        {
            modelo_maquina::where('COD_MODELO',$id)->delete();
            imagen_modelo::where('COD_IMAGEN',$idImagen)->delete();//elimina la imagen en la BD
            File::delete(public_path().'/imagenes/ModelosMaquinas/'.$urlImagen);//elimina la imagen en el Sistema de Archivos
            Flash('¡Se ha eliminado el modelo de máquina con el código: ('.$id.') exitósamente!','danger');
            return Redirect()->route('modelosMaquinas.index');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            Flash('¡No se puede eliminar el modelo de máquina con el código: ('.$id.') ya que está incluido en una o varias órdenes de fabricación!','danger');
            return Redirect()->route('modelosMaquinas.index');
        }   


        
    }

//Inserta los tipos de materiales con ajax.     
     public function actualizaComboTipoModMaq($id)   
     {   

         $tipo_modelo = tipo_modelo::all();    
     
          //Se encarga de buscar cúal fue el item que se selecciono para traer su nombre, pues solo tenemos el id.   
         foreach ($tipo_modelo as $tipo)   
         {   
             if(strcmp($tipo->COD_TIPO_MODELO,$id) == 0)   
             {   
                 $nombre=$tipo->NOMBRE;    
                 $cod=$tipo->COD_TIPO_MODELO;    
             }   
         }  


   

         //Se pone el item que se seleccionó y se enlaza con una estructura html.    
         $combo = '<option value="'.$cod.'">'.$nombre.'</option>';    

      
        foreach($tipo_modelo as $tipoModMaq)    
        {   
             //Se valida que el item que seleccionó arriba no aparezca repetido abajo una vez que se abre el combo.    
             if($tipoModMaq->NOMBRE!=$nombre)    
            {   
                 $combo=$combo."<option value='".$tipoModMaq->COD_TIPO_MODELO."'>".$tipoModMaq->NOMBRE."</option>"; //se van creando cada uno de los valores dentro de el código html    
             }   
         }   

     
         return $combo; //El controlador le manda la nueva estructura html con sus respectivos valores para que ajax lo reciba en el método en el frontend.      
     }   
        
     //Se reciben los 2 valores que se mandaron desde el frontend en la ventana modal.     
     public function guardarTipoModMaq($cod,$nomb)   
     {   
         $tipo_modelo=new tipo_modelo;// se crea un objeto nuevo de tipo material    
         $tipo_modelo->COD_TIPO_MODELO=$cod;//se llenan las variables del objeto   
         $tipo_modelo->NOMBRE=$nomb;   
         $tipo_modelo->save();   
         return "Guardado con exito"; // se retorna al frontend que se insertó el nuevo tipo   
     }   
  }




