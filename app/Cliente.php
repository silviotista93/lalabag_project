<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre','documento','email','telefono','direccion','fecha_nacimiento' ,'compras'
    ];
}
