<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemClientes extends Model
{
    protected $fillable = [
        'nombre_fiador', 'apellido_fiador', 'documento_fiador','direccion_casa_fiador','direccion_trabajo_fiador',
        'telefono_fiador',
    ];
}
