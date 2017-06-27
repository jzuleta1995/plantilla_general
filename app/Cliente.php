<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'documento','direccion_casa','direccion_trabajo',
        'telefono','celular', 'estado',
    ];
}
