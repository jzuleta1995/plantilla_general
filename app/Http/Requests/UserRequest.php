<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'nombre'                    => 'required',
            'apellido'                  => 'required',
            'documento'                 => 'required|unique:users',
            'direccion'                 => 'required',
            'telefono'                  => 'required',
            'email'                     => 'required|email|unique:users',
            'pregunta_secreta'          => 'required',
            'respuesta_secreta'         => 'required',
            'password'                  => 'required',
            'confirmacion_password'     => 'required|same:password',
            'estado'                    => 'required',
        ];
    }
}
