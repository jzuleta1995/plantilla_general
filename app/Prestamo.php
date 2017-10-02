<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable =
    [
        'cliente_id',
        'prestamo_valor',
        'prestamo_tasa',
        'prestamo_tipo',
        'prestamo_tiempo_cobro',
        'prestamo_numero_cuotas',
        'valor_cuota',
        'prestamo_fecha',
        'prestamo_fecha_inicial',
        'prestamo_fecha_proximo_cobro',
        'prestamo_valor_total',
        'prestamo_valor_abonado',
        'prestamo_valor_proxima_cuota',
        'prestamo_valor_actual',
        'prestamo_estado',
    ];

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("prestamo_nombrecliente"), "ILIKE", "%$nombre%");
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function abonos()
    {
        return $this->hasMany('App\Abono');
    }
}
