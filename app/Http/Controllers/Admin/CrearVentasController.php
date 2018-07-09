<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrearVentasController extends Controller
{
    public function crearVentas(){
        $ventas = Venta::orderBy('id','desc')->get();
        $clientes = Cliente::all();
        return view('admin.ventas.crear-ventas',compact('ventas','clientes'));
    }
}
