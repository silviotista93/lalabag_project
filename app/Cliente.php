<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre','user_id','documento','email','telefono','direccion','fecha_nacimiento' ,'compras'
    ];

    public function setNombreAttribute($valor){
        $this->attributes['nombre'] = strtolower($valor);
    }

    public function getNombreAttribute($valor){
        return ucwords($valor);
    }


}
