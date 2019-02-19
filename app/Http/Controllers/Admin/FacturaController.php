<?php

namespace App\Http\Controllers\Admin;

use App\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacturaController extends Controller
{
    public function recibo($codigo){
        $obtenerDatos = Venta::where('codigo',$codigo)->with('ventas_cliente','ventas_vendedor')->first();
        return view('admin.recibo',compact('obtenerDatos'));
    }
}
