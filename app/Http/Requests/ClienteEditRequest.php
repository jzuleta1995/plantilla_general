<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClienteEditRequest extends FormRequest
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
            'cliente_nombre'             => 'required',
            'cliente_apellido'           => 'required',
            'cliente_documento'          => 'required',
            'cliente_direccion_casa'     => 'required',
            'cliente_direccion_trabajo'  => 'required',
            'cliente_telefono'           => 'required',
            'cliente_celular'            => 'required',
            'cliente_estado'             => 'required',
            'cobrador_id'                => 'required',
            'cliente_ciudad'             => 'required',


        ];
    }
}
