<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    protected $fillable =
    [
        'cobrador_nombre',
        'cobrador_apellido',
        'cobrador_documento',
        'cobrador_direccion',
        'cobrador_telefono',
        'cobrador_celular',
        'cobrador_ciudad',
        'cobrador_estado',
    ];

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("cobrador_nombre_completo"), "ILIKE", "%$nombre%");
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
}

