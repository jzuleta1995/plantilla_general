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
    protected $fillable =
     [
        'nombre',
        'apellido',
        'documento',
        'direccion',
        'telefono',
        'email',
        'pregunta_secreta',
        'respuesta_secreta',
        'password',
        'tipo',
        'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("nombre_completo"), "ILIKE", "%$nombre%");
        }
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }

    public function cobradores()
    {
        return $this->hasMany('App\Cobrador');
    }

    public function prestamos()
    {
        return $this->hasMany('App\Prestamo');
    }

    public function abonosPrestamos()
    {
        return $this->hasMany('App\Abono');
    }

}
