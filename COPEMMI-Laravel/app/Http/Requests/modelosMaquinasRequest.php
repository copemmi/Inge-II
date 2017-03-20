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
                    'COD_MODELO'=>'max:10|required|unique:modelos_maquinas',//en el unique hay que poner el nombre de la tabla de la base de datos
                    'COD_IMAGEN' =>'max:10|required',
                    'IMAGEN' => 'required|image|max:1000|mimes:jpg,jpeg,png',
                    'COD_TIPO_MODELO' =>'max:10|required',
                    'NOMBRE'=>'max:50|required',
                    'CARACTERISTICAS' =>'max:255|required',
                    'PRECIO' =>'max:999999999|Numeric|Integer|required'
                ];
            }

            case 'PUT':{
                return [
                    'COD_IMAGEN' =>'max:10|required',
                    'IMAGEN' => 'image|max:1000|mimes:jpg,jpeg,png',
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

     // para personalizar el mensaje de error del campo y el tipo de error
    public function messages()
    {
        return [
            'IMAGEN.uploaded' => 'El campo Imagen debe contener una imagen de tipo jpg,jpeg,png.',
        ];
    }


    //para cambiar el atributo que se muestra en los mensajes de error de laravel, ya que toma los nombres de los campos de la tabla
    public function attributes()
    {
        return [
            'COD_MODELO'=>'Código del modelo',
            'COD_IMAGEN' =>'Código de la imagen',
            'IMAGEN' => 'Imagen',
            'COD_TIPO_MODELO' =>'Tipo de modelo',
            'NOMBRE'=>'Nombre del modelo',
            'CARACTERISTICAS' =>'Características',
            'PRECIO' =>'Precio'
        ];
    }
}
