<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'cliente_id', 'valor_prestamo', 'tasa','tipo_prestamo',
        'tiempo_cobro','cantidad_cuotas_pagar', 'valor_cuota_pagar', 'fecha_prestamo',
        'fecha_inicio_prestamo', 'fecha_proximo_cobro', 'valor_total_deuda',
        'valor_abono_deuda', 'valor_proximo_pago_deuda', 'estado',
    ];
}
