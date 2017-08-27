<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbonoRequest extends FormRequest
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
            'cliente_id'         => 'required',
            'prestamo_id'        => 'required',
            'abono_valor_cuota'  => 'required',
            'abono_valor'        => 'required',
            'abono_fecha'        => 'required',
            'abono_observacion'  => 'required',
            'abono_tipo_pago'    => 'required',
            'abono_estado'       => 'required',
        ];
    }
}
