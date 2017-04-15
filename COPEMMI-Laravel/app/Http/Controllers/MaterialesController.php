<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\material;
use App\tipo_material;
use Laracasts\Flash\Flash;
use App\Http\Requests\materialesRequest;
use Illuminate\Support\Facades\Input;

class MaterialesController extends Controller
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
    
      

      $check=Input::has('codTipoMaterial');
      $checkValue = Input::get('codTipoMaterial');

      switch ($checkValue){
      
          case 'nombre':
            
              $materiales=material::buscadorNombre($request->buscar)->orderBy('NOMBRE','DESC')->paginate(100);
              break;

          case 'cod':
              
              $materiales=material::buscadorCodigo($request->buscar)->orderBy('COD_MATERIAL','DESC')->paginate(100);
              break;

          case 'tipo':
             
              $materiales=material::buscadorTipo($request->buscar)->orderBy('COD_TIPO_MATERIAL','DESC')->paginate(100);
              break; 

          default:      
            $materiales=material::buscadorNombre(" ")->paginate(1);//si se le quita el paginate, no mostrara nada
      }

        return View('Materiales/Materiales')->with('materiales',$materiales);
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
        $tipo_material = tipo_material::all();
        return View('Materiales/IngresarMateriales')->with('tipo_material',$tipo_material);
    }
        Flash("No tiene permisos para crear materiales",'danger');  
        return Redirect()->route('materiales.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materialesRequest $request)
    {
        $material=new material;
        $material->cod_material=$request->get('COD_MATERIAL');
        $material->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
        $material->nombre=$request->get('NOMBRE');
        $material->caracteristicas=$request->get('CARACTERISTICAS');
        $material->cantidad=$request->get('CANTIDAD');
        $material->cantidadminima=$request->get('CANTIDADMINIMA');
        $material->fecha_ingreso=$request->get('FECHA_INGRESO');

        $material->save();

        Flash("¡Se ha insertado el material: (".$material->nombre."), con el código: (".$material->cod_material.") exitósamente!",'success');

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
        $material = material::find($id);
        
        $tipo_material = tipo_material::all();
        return View('Materiales/MostrarMateriales')->with('material',$material)->with('tipo_material',$tipo_material);
        
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
        $material = material::find($id);
        $tipo_material = tipo_material::all();
        return View('Materiales/ModificarMateriales')->with('material',$material)->with('tipo_material',$tipo_material);
        }
        Flash("No tiene permisos para modificar materiales",'danger');  
        return Redirect()->route('materiales.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(materialesRequest $request, $id)
    {
        $material = material::find($id);
        $material->cod_tipo_material=$request->get('COD_TIPO_MATERIAL');
        $material->nombre=$request->get('NOMBRE');
        $material->caracteristicas=$request->get('CARACTERISTICAS');
        $material->cantidad=$request->get('CANTIDAD');
        $material->cantidadminima=$request->get('CANTIDADMINIMA');

        $material->update();

        Flash("¡Se ha modificado el material exitósamente!",'info');

        return Redirect()->route('materiales.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, materialesRequest $request)
    {
          $usuario_actual=\Auth::user();
        if($usuario_actual->privilegio==1){
        try 
        {
            material::where('COD_MATERIAL',$id)->delete();
            Flash('¡Se ha eliminado el material con el código: ('.$id.') exitósamente!','danger');
            return Redirect()->route('materiales.index');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            Flash('¡No se puede eliminar el material con el código: ('.$id.') ya que está siendo usado por uno o varios modelos de máquinas!','danger');
            return Redirect()->route('materiales.index');
        }
        }
           Flash('No tiene permisos para eliminar el material','danger');
           return Redirect()->route('materiales.index');
    }


    public function actualizaComboTipoMat($id)
    {

     $tipo_material = tipo_material::all();

     foreach ($tipo_material as $tipo) //se encarga de buscar cúal fue el item que se selecciono para traer su nombre, pues solo tenemos el id
     {
       if(strcmp($tipo->COD_TIPO_MATERIAL,$id) == 0)
       {
            $nombre=$tipo->NOMBRE;
            $cod=$tipo->COD_TIPO_MATERIAL;

       }

       }

    $combo = '<option value="'.$cod.'">'.$nombre.'</option>'; //se pone el item que se seleccionó y se enlaza con una estructura html

     foreach($tipo_material as $tipoMat)
     {
       if($tipoMat->NOMBRE!=$nombre)// se valida que el item que seleccionó arriba no aparezca repetido abajo una vez que se abre el combo
       {
          $combo=$combo."<option value='".$tipoMat->COD_TIPO_MATERIAL."'>". $tipoMat->NOMBRE."</option>"; //se van creando cada uno de los valores dentro de el código html 

       }
     }
     

return $combo; // el controlador le manda la nueva estructura html con sus respectivos valores para que ajax lo reciba en el método en el frontend 


 /*$data=array("identificador"=>$id, "nomb" =>$nomb);
        return   json_encode($data);*/

    }

    public function guardarTipoMat($cod,$nomb)// se reciben los 2 valores que se mandaron desde el frontend en la ventana modal
    {
  

$tipo_material=new tipo_material;// se crea un objeto nuevo de tipo material
$tipo_material->COD_TIPO_MATERIAL=$cod;//se llenan las variables del objeto
$tipo_material->NOMBRE=$nomb;
$tipo_material->save();
return "Guardado con exito"; // se retorna al frontend que se insertó el nuevo tipo
    }



}