<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable =
    [
        'cliente_nombre',
        'cliente_apellido',
        'cliente_documento',
        'cliente_direccion_casa',
        'cliente_direccion_trabajo',
        'cliente_lugar_trabajo',
        'cliente_telefono',
        'cliente_celular',
        'cliente_ciudad',
        'cliente_estado',
        'cobrador_id',
        'cliente_calificacion',
    ];

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre) != ''){
            $query->where(\DB::raw("cliente_nombre_completo"), "ILIKE", "%$nombre%");
        }
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cobrador()
    {
        return $this->belongsTo('App\Cobrador');
    }

    public function fiadors()
    {
        return $this->hasMany('App\Fiador');
    }

    public function prestamos()
    {
        return $this->hasMany('App\Prestamo');
    }

}
