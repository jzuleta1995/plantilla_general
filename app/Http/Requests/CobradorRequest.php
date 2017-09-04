<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CobradorRequest extends FormRequest
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
            'cobrador_nombre'    => 'required',
            'cobrador_apellido'  => 'required',
            'cobrador_documento' => 'required|unique:cobradors',
            'cobrador_direccion' => 'required',
            'cobrador_telefono'  => 'required',
            'cobrador_celular'   => 'required',
            'cobrador_ciudad'    => 'required',
            'cobrador_estado'    => 'required',
        ];
    }
}
