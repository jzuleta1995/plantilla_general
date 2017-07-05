<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CobroPrestamo extends Model
{
    protected $fillable = [
        'cliente_id', 'prestamo_id', 'valor_pagar','valor_real_pagar','observacion',
    ];
}
