<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
        protected $fillable = [
        'codigo','id_cliente','id_vendedor','productos','impuesto','neto','total','metodo_pago'
        ];
        public function ventas_cliente(){

            return $this->belongsTo(Cliente::class, 'id_cliente');
        }

        public function ventas_vendedor(){

            return $this->belongsTo(User::class, 'id_vendedor');
        }
}
