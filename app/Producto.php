<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'id_categoria','codigo','descripcion','imagen','precio_compra','precio_venta' ,'ventas'
    ];

    public function tipoCategoria(){

        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->attributes['precio_compra'], 2);
    }
    
}
