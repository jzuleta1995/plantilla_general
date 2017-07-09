<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'documento','direccion_casa','direccion_trabajo',
        'lugar_trabajo', 'ciudad', 'telefono','celular', 'estado', 'cobrador_id',
    ];

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("CONCAT(nombre, ' ' ,apellido)"), "LIKE", "%$nombre%");
        }
    }
}
