<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materialesRequest extends FormRequest
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
                    'COD_MATERIAL'=>'max:10|required|unique:materiales',
                    'COD_TIPO_MATERIAL' =>'max:10|required',
                    'NOMBRE' =>'max:50|required',
                    'CARACTERISTICAS' =>'max:255|required',
                    'CANTIDAD' =>'max:999999|Numeric|Integer|required'
                ];
            }

            case 'PUT':{
                return [
                    'COD_TIPO_MATERIAL' =>'max:10|required',
                    'NOMBRE' =>'max:50|required',
                    'CARACTERISTICAS' =>'max:255|required',
                    'CANTIDAD' =>'max:999999|Numeric|Integer|required'
                ];
            }

            case 'PATCH':{
                return [];
            }

            default:break;
        }
        
    }

    // para personalizar el mensaje de error del campo y el tipo de error
    /*public function messages()
    {
        return [
            'COD_MATERIAL.required'    => 'El código de material es requerido llenarlo',
        ];
    }*/


    //para cambiar el atributo que se muestra en los mensajes de error de laravel, ya que toma los nombres de los campos de la tabla
    public function attributes()
    {
        return [
            'COD_MATERIAL'=>'Código del material',
            'COD_TIPO_MATERIAL'=> 'Tipo de material', 
            'NOMBRE'=> 'Nombre del material',
            'CARACTERISTICAS' =>'Características',
            'CANTIDAD' =>'Cantidad'
        ];
    }
}
