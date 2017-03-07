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

class ClientesController extends Controller
{

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
        $cliente = cliente::all();
    
    return View('Clientes/IngresarClientes')->with('cliente',$cliente);
    
    }

    /**
     * Store a newly created resource in storage.
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
        $cliente = cliente::find($id);
        
        return View('Clientes/ModificarClientes')->with('cliente',$cliente);
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

         cliente::where('ID',$id)->delete();
       
        Flash('¡Se ha eliminado el cliente con la identificacion: ('.$id.') exitósamente!','danger');

        return Redirect()->route('clientes.index');
        
    }
}