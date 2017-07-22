<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiador extends Model
{
    protected $fillable = [
        'fiador_nombre',
        'fiador_apellido',
        'fiador_documento',
        'fiador_direccion_casa',
        'fiador_direccion_trabajo',
        'fiador_telefono',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
