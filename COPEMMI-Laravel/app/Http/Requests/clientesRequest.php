<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //Reglas para el éxito del envío de datos en el formulario

   public function rules()
    {
        switch($this->method()){

            case 'GET':{
                return [];
            }

            case 'DELETE':{
                return [];
            }

            case 'POST':{
                return [
                    'ID'=>'max:11|required|unique:clientes',
                    'NOMBRE'=>'max:50|required',
                    'PRIMER_APELLIDO'=>'max:50|required',
                    'SEGUNDO_APELLIDO'=>'max:50|required',
                    'DIRECCION'=>'max:100|required',
                    'TELEFONO'=>'max:10|required',
                    'CORREO'=>'max:50|required'
                ];
            }

            case 'PUT':{
                return [
                    'NOMBRE' =>'max:50|required',
                    'PRIMER_APELLIDO' =>'max:50|required',
                    'SEGUNDO_APELLIDO' =>'max:50|required',
                    'DIRECCION' =>'max:50|required',
                    'TELEFONO' =>'max:10|required',
                    'CORREO' =>'max:50|required'
                ];
            }

            case 'PATCH':{
                return [];
            }

            default:break;
        }
    }


     public function attributes()
    {
        return [
            'ID'=>'Identificacion',
            'NOMBRE'=> 'Nombre', 
            'PRIMER_APELLIDO'=> 'Primer Apellido',
            'SEGUNDO_APELLIDO' =>'Segundo Apellido',
            'DIRECCION' =>'Direccion',
            'TELEFONO' => 'Telefono',
            'CORREO' => 'Correo'
        ];
    }
}
