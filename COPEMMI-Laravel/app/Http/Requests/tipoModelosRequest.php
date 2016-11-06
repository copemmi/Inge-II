<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipoModelosRequest extends FormRequest
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
                    'COD_TIPO_MODELO'=>'max:10|required|unique:tipos_modelos',
                    'NOMBRE' =>'max:50|required',
                    
                ];
            }

            case 'PUT':{
                return [
                    'COD_TIPO_MODELO'=>'max:10|required',
                    'NOMBRE' =>'max:50|required',
                ];
            }

            case 'PATCH':{
                return [];
            }

            default:break;
        }
    }

     //para cambiar el atributo que se muestra en los mensajes de error de laravel, ya que toma los nombres de los campos de la tabla
    public function attributes()
    {
        return [
            'COD_TIPO_MODELO'=> 'Código del tipo',
            'NOMBRE'=> 'Nombre del tipo',
        ];
    }
}
