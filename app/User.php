<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'documento','direccion','telefono',
        'email','pregunta_id', 'respuesta_secreta', 'password', 'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("CONCAT(nombre, ' ' ,apellido)"), "LIKE", "%$nombre%");
        }
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

}
