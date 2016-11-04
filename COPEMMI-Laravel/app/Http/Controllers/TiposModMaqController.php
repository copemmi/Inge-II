<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tipo_modelo;
use Laracasts\Flash\Flash;
use App\Http\Requests\tipoModelosRequest; //Hacer el request de tipo de modelos. 

class TiposModMaqController extends Controller
{
	   //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function index(Request $request)
    {
    	$tipoModelo = tipo_modelo::orderBy('NOMBRE','DESC')->paginate(10);
        
        return View('TiposModelosMaquinas/TiposModelosMaquinas')->with('tipoModelo',$tipoModelo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_modelo = tipo_modelo::all();

        return View('TiposModelosMaquinas/IngresarTiposModMaq')->with('tipo_modelo',$tipo_modelo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoModelosRequest $request)
    {
        $tipoModelo=new tipo_modelo;
        $tipoModelo->cod_tipo_modelo=$request->get('COD_TIPO_MODELO');
        $tipoModelo->nombre=$request->get('NOMBRE');
        

        $tipoModelo->save();

        Flash("¡Se ha insertado el tipo de material: (".$tipoModelo->nombre."), con el código: (".$tipoModelo->cod_tipo_modelo.") exitósamente!",'success');

        return Redirect()->route('TiposModelosMaquinas.index');
    }


}