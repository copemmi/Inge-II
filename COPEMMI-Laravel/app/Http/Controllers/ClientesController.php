<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\cliente;
use App\Http\Requests\clientesRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Auth;
use App\User;
class ClientesController extends Controller
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


      $check=Input::has('identificacion');
      $checkValue = Input::get('identificacion');

      switch ($checkValue){
      
          case 'id':

              $clientes=cliente::buscadorIdentificacion($request->buscar)->orderBy('ID','DESC')->paginate(100);
              break;
          

           case 'nombre':
            
              $clientes=cliente::buscadorNombre($request->buscar)->orderBy('NOMBRE','DESC')->paginate(100);
              break;

            default:      
            $clientes=cliente::buscadorNombre(" ")->paginate(1);//si se le quita el paginate, no mostrara nada
        }
    
        return View('Clientes/Clientes')->with('clientes',$clientes);
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
        $cliente=cliente::all(); 
        return View('Clientes/IngresarClientes')->with('cliente',$cliente);
        }
        Flash("No tiene permisos para crear clientes",'danger');  
        return Redirect()->route('clientes.index');
     }   
     /* Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(clientesRequest $request)
    {

        $cliente=new cliente;
        $cliente->id=$request->get('ID');
        $cliente->nombre=$request->get('NOMBRE');
        $cliente->primer_apellido=$request->get('PRIMER_APELLIDO');
        $cliente->segundo_apellido=$request->get('SEGUNDO_APELLIDO');
        $cliente->direccion=$request->get('DIRECCION');
        $cliente->telefono=$request->get('TELEFONO');
        $cliente->correo=$request->get('CORREO');
        $cliente->nombre_empresa=$request->get('NOMBRE_EMPRESA');
        $cliente->cedula_juridica=$request->get('CEDULA_JURIDICA');

        $cliente->save();  

        Flash("¡Se ha insertado el cliente: (".$cliente->nombre."), con la cédula: (".$cliente->id.") exitosamente!",'success');

        return Redirect()->route('clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cliente = cliente::find($id);


    return View('Clientes/MostrarClientes')->with('cliente',$cliente);
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
        $cliente = cliente::find($id);
        return View('Clientes/ModificarClientes')->with('cliente',$cliente);
    }
        Flash("No tiene permisos para modificar clientes",'danger');  
        return Redirect()->route('clientes.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(clientesRequest $request, $id)
    {
        $cliente = cliente::find($id);
        $cliente->direccion=$request->get('DIRECCION');
        $cliente->telefono=$request->get('TELEFONO');
        $cliente->correo=$request->get('CORREO');
        $cliente->nombre_empresa=$request->get('NOMBRE_EMPRESA');
        $cliente->cedula_juridica=$request->get('CEDULA_JURIDICA');

        $cliente->update();

        Flash("¡Se ha modificado el cliente exitósamente!",'info');

        return Redirect()->route('clientes.show',$id);

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
            try 
            {
            cliente::where('ID',$id)->delete();
            Flash('¡Se ha eliminado el cliente con la identificación: ('.$id.') exitósamente!','danger');
            return Redirect()->route('clientes.index');
            }
            catch (\Illuminate\Database\QueryException $e)
            {
            Flash('¡No se puede eliminar el cliente con la identificación: ('.$id.') ya que está siendo incluido en una o varias órdenes de fabricación!','danger');
            return Redirect()->route('clientes.index');
            }   
          }
        Flash("No tiene permisos para eliminar clientes",'danger');  
        return Redirect()->route('clientes.index');
     }

//Inserta los tipos de materiales con ajax.         
     public function actualizaComboClientes($ids)      
     {     

         $cliente = cliente::all();        
       
          //Se encarga de buscar cúal fue el item que se selecciono para traer su nombre, pues solo tenemos el id.     
         foreach ($cliente as $cl)     
         {     
             if(strcmp($cl->ID,$ids) == 0)     
             {     
                 $id=$cl->ID;      
                 $nomb=$cl->NOMBRE;        
                 $ape1=$cl->PRIMER_APELLIDO;
                 $ape2=$cl->SEGUNDO_APELLIDO;
             }     
         }     
       
         //Se pone el item que se seleccionó y se enlaza con una estructura html.      
        $combo = '<option value="'.$id.'">'.$nomb." ".$ape1." ".$ape2.'</option>';        
      
         foreach($cliente as $tipoCl)      
         {     
             //Se valida que el item que seleccionó arriba no aparezca repetido abajo una vez que se abre el combo.        
             if($tipoCl->NOMBRE!=$nomb)      
            {     
                 $combo=$combo."<option value='".$tipoCl->ID."'>". $tipoCl->NOMBRE." ".$tipoCl->PRIMER_APELLIDO." ".$tipoCl->SEGUNDO_APELLIDO."</option>"; //se van creando cada uno de los valores dentro de el código html      
            }     
            
         }     
       
         return $combo; //El controlador le manda la nueva estructura html con sus respectivos valores para que ajax lo reciba en el método en el frontend.        
     }     
       
    //Se reciben los 2 valores que se mandaron desde el frontend en la ventana modal.         
     public function guardarClientes($id,$nomb,$ape1,$ape2,$dir,$tel,$email,$nombEmp,$cedJud)      
     {   


         $cliente=new cliente;     
         $cliente->ID=$id;     
         $cliente->NOMBRE=$nomb;       
         $cliente->PRIMER_APELLIDO=$ape1;      
         $cliente->SEGUNDO_APELLIDO=$ape2;     
         $cliente->DIRECCION=$dir;     
         $cliente->TELEFONO=$tel;      
         $cliente->CORREO=$email;      
         $cliente->NOMBRE_EMPRESA=$nombEmp;        
         $cliente->CEDULA_JURIDICA=$cedJud;        
        $cliente->save();     
       
         return "Guardado con exito"; // se retorna al frontend que se insertó el nuevo tipo       
     }     
  









}