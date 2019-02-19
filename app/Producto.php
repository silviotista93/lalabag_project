<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $fillable = [
        'id_categoria','codigo','nombre','descripcion','imagen','precio_compra','precio_venta' ,'ventas'
    ];

    public function tipoCategoria(){

        return $this->belongsTo(Categoria::class,'id_categoria');
    }
    public function setNombreAttribute($valor){
        $this->attributes['nombre'] = strtolower($valor);
    }

    public function getNombreAttribute($valor){
        return ucwords($valor);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->attributes['precio_compra'], 2);
    }
    public function actualizarProducto_alCrearVenta($tabla,$id,$item1){
        return DB::table($tabla)
            ->where('id','=',$id)
            ->update([$item1]);
    }
    public function productos($id,$item){
        return DB::table('productos')
            ->select($item)
            ->where('id', '=',$id);
    }
    public function actualizarProducto($id){
        return DB::table('productos')
            ->where('id','=',$id)
            ->update('ventas');
    }
    
}
