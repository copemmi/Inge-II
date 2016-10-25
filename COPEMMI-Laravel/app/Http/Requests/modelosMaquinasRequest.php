<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class modelosMaquinasRequest extends FormRequest
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
                    'COD_MODELO'=>'max:10|required|unique:modelosMaquinas',
                    'COD_IMAGEN' =>'max:10|required',
                    'COD_TIPO_MODELO' =>'max:10|required',
                    'NOMBRE'=>'max:50|required',
                    'CARACTERISTICAS' =>'max:255|required',
                    'PRECIO' =>'max:999999999|Numeric|Integer|required'
                ];
            }

            case 'PUT':{
                return [
                    'COD_IMAGEN' =>'max:10|required',
                    'COD_TIPO_MODELO' =>'max:10|required',
                    'NOMBRE'=>'max:50|required',
                    'CARACTERISTICAS' =>'max:255|required',
                    'PRECIO' =>'max:999999999|Numeric|Integer|required'
                ];
            }

            case 'PATCH':{
                return [];
            }

            default:break;
        }
        
    }
}
