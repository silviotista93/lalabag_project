<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
        public function ventas_cliente(){

            return $this->belongsTo(Cliente::class, 'id_cliente');
        }

        public function ventas_vendedor(){

            return $this->belongsTo(User::class, 'id_vendedor');
        }
}
