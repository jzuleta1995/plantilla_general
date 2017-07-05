<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'documento','direccion',
        'telefono','celular', 'ciudad', 'estado',
    ];

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("CONCAT(nombre, ' ' ,apellido)"), "LIKE", "%$nombre%");
        }
    }
}

