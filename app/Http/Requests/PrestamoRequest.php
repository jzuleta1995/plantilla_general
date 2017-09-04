<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestamoRequest extends FormRequest
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

            'cliente_id'                   => 'required',
            'prestamo_valor'               => 'required',
            'prestamo_tasa'                => 'required',
            'prestamo_tipo'                => 'required',
            'prestamo_tiempo_cobro'        => 'required',
            'prestamo_numero_cuotas'       => 'required',
            //'valor_cuota'                  => 'required',
            'prestamo_fecha'               => 'required',
            'prestamo_fecha_inicial'       => 'required',
            'prestamo_fecha_proximo_cobro' => 'required',
            'prestamo_valor_total'         => 'required',
            'prestamo_valor_abonado'       => 'required',
            'prestamo_valor_proxima_cuota' => 'required',
            'prestamo_valor_actual'        => 'required',
        ];
    }
}
