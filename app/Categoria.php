<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'categoria'
    ];

    public function productos(){

        return $this->hasOne(Producto::class,'id_categoria');
    }
    public function setCategoriaAttribute($valor){
        $this->attributes['categoria'] = strtolower($valor);
    }

    public function getCategoriaAttribute($valor){
        return ucwords($valor);
    }
}
