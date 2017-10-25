<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
   /* protected $primaryKey = null;
    public $incrementing = false;*/


    protected $fillable =
    [

        'cliente_id',
        'prestamo_id',
        'abono_valor_cuota',
        'abono_valor',
        'abono_fecha',
        'abono_observacion',
        'abono_tipo_pago',
        'abono_estado',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function prestamo()
    {
        return $this->belongsTo('App\Prestamo');
    }
}
