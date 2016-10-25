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
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

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

        return View('ModelosMaquinas/IngresarModMaq')->with('tipo_modelo',$tipo_modelo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        return View('ModelosMaquinas/MostrarModMaq')->with('modelos',$modelos)->with('tipo_modelo',$tipo_modelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
  
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
  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}