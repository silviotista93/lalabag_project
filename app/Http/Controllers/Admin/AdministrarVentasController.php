<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class AdministrarVentasController extends Controller
{
    public function administrarVentas(){

        return view('admin.ventas.administrar-ventas');
    }

    public function eliminarVenta($id){

        $traerVenta = Venta::select('*')->where('id', '=', $id)->first();
        $productos = json_decode($traerVenta['productos'], true);
        $totalProductosComprados = array();

        foreach ($productos as $key => $value) {
            array_push($totalProductosComprados, $value['cantidad']);

        }

        $sumaCantidadProductos = array_sum($totalProductosComprados);
        $idCliente = $traerVenta->id_cliente;

        $traerCliente_2 = Cliente::select('*')->where('id', '=', $idCliente)->first();

        $valor1a_2 = $traerCliente_2['compras'] - $sumaCantidadProductos;
        $item1a_2 = "compras";

        $comprasCliente_2 = Cliente::where('id', '=', $idCliente)->update(array($item1a_2 => $valor1a_2));

        $venta = Venta::findOrFail($id);
        $venta->delete();

        return back()->with('eliminar','Venta eliminada Correctamente');
    }

    public function listarTabla(){

        /*if ($fechaInicial == null){
            return DataTables::of(Venta::with('ventas_cliente','ventas_vendedor')->get())->make(true);

        }elseif ($fechaInicial == $fechaFinal){
            return DataTables::of(Venta::select('*')->where('created_at','like','%$fechaFinal%')->with('ventas_cliente','ventas_vendedor')->get())->make(true);

        }*/
        return DataTables::of(Venta::with('ventas_cliente','ventas_vendedor')->get())->make(true);
    }
}
