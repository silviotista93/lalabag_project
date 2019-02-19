<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Producto;
use App\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrearVentasController extends Controller
{
    public function crearVentas()
    {
        $ventas = Venta::orderBy('id', 'desc')->get();
        $codigoFactura = Venta::select('id')->orderby('created_at', 'DESC')->first();
        $clientes = Cliente::all();
        return view('admin.ventas.crear-ventas', compact('ventas', 'clientes', 'codigoFactura'));
    }

    public function crearVenta(Request $request)
    {
        $var = $request->get('nuevaVenta');
        if (isset($var)) {
            /* ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS*/

            $listaProductos = json_decode($request->get('listaProductos'));
            $totalProductosComprados = array();

            foreach ($listaProductos as $key => $value) {
                $value = get_object_vars($value); //ESTO AYUDA A QUE PODAMOS TOMAR VALORES DE ARRAY MAS FACIL
                array_push($totalProductosComprados, $value['cantidad']);
                $valor = $value['id'];

                $traerProducto = Producto::select('*')->where('id', '=', $valor)->first();

                //ACTUALIZAR EL NUMERO DE VENTAS DE CADA PRODUCTO
                $item1a = "ventas";
                $valor1a = $value['cantidad'] + $traerProducto['ventas'];
                $nuevasVentas = Producto::where('id', '=', $valor)->update(array($item1a => $valor1a));

                //ACTUALIZAR LA CANTIDAD DEL STOCK DE CADA PRODUCTO
                $item1b = "stock";
                $valor1b = $value['stock'];
                $nuevasStock = Producto::where('id', '=', $valor)->update(array($item1b => $valor1b));

            }
            //ACTUALIZAR COMPRAS DEL CLIENTE
            $idCliente = $request->get('seleccionarCliente');
            $traerCliente = Cliente::select('*')->where('id', '=', $idCliente)->first();
            $item1a = "compras";
            $valor1a = array_sum($totalProductosComprados) + $traerCliente['compras'];
            $comprasCliente = Cliente::where('id', '=', $idCliente)->update(array($item1a => $valor1a));

            $item1b = "ultima_compra";
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');
            $valor1b = $fecha . ' ' . $hora;
            $comprasCliente = Cliente::where('id', '=', $idCliente)->update(array($item1b => $valor1b));
        }

        $venta = Venta::create([
            'codigo' => $request->get('nuevaVenta'),
            'id_cliente' => $request->get('seleccionarCliente'),
            'id_vendedor' => $request->get('idVendedor'),
            'productos' => $request->get('listaProductos'),
            'impuesto' => $request->get('nuevoPrecioImpuesto'),
            'neto' => $request->get('nuevoPrecioNeto'),
            'total' => $request->get('total'),
            'metodo_pago' => $request->get('listaMetodoPago'),

        ]);

        return back()->withFlash('Venta Creada Exitosamente');

    }

    //MOSTRAR LA VISTA DE EDITAR LA VENTA
    public function editar_venta_index($id)
    {
        $ventas = Venta::orderBy('id', 'desc')->get();
        $todasVentas = Venta::with('ventas_vendedor', 'ventas_cliente')->find($id);
        $codigoFactura = Venta::select('id')->orderby('created_at', 'DESC')->first();
        $clientes = Cliente::all();
        return view('admin.ventas.editar-ventas', compact('ventas', 'clientes', 'codigoFactura', 'todasVentas'));
    }


    //METODO PARA ACTUALIZAR LA VENTA
    public function editarVenta(Request $request, Venta $todasVentas)
    {
        $var = $request->get('editarVenta');
        if (isset($var)) {
            /* FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES*/
            $traerVenta = Venta::select('*')->where('codigo', '=', $var)->first();

            $productos = json_decode($traerVenta['productos'], true);

            $totalProductosComprados = array();
            foreach ($productos as $key => $value) {
                array_push($totalProductosComprados, $value['cantidad']);
                $valor = $value['id'];
                $traerProducto = Producto::select('*')->where('id', '=', $valor)->first();

                $item1a = "ventas";
                $valor1a = $traerProducto['ventas'] - $value['cantidad'];
                $nuevasVentas = Producto::where('id', '=', $valor)->update(array($item1a => $valor1a));

                $item1b = "stock";
                $valor1b = $value['cantidad'] + $traerProducto['stock'];
                $nuevasStock = Producto::where('id', '=', $valor)->update(array($item1b => $valor1b));


            }
            $idCliente = $request->get('seleccionarCliente');
            $traerCliente = Cliente::select('*')->where('id', '=', $idCliente)->first();

            $idCliente = $request->get('seleccionarCliente');
            $traerCliente = Cliente::select('*')->where('id', '=', $idCliente)->first();
            $item1a = "compras";
            $valor1a = $traerCliente['compras'] - array_sum($totalProductosComprados);
            $comprasCliente = Cliente::where('id', '=', $idCliente)->update(array($item1a => $valor1a));


            $listaProductos_2 = json_decode($request->get('listaProductos'));

            foreach ($listaProductos_2 as $key => $value_2) {
                $value_2 = get_object_vars($value_2); //ESTO AYUDA A QUE PODAMOS TOMAR VALORES DE ARRAY MAS FACIL
                array_push($totalProductosComprados, $value_2['cantidad']);
                $valor_2 = $value_2['id'];

                $traerProducto_2 = Producto::select('*')->where('id', '=', $valor_2)->first();

                //ACTUALIZAR EL NUMERO DE VENTAS DE CADA PRODUCTO
                $item1a_2 = "ventas";
                $valor1a_2 = $value_2['cantidad'] + $traerProducto_2['ventas'];
                $nuevasVentas_2 = Producto::where('id', '=', $valor_2)->update(array($item1a_2 => $valor1a_2));

                //ACTUALIZAR LA CANTIDAD DEL STOCK DE CADA PRODUCTO
                $item1b_2 = "stock";
                $valor1b_2 = $value_2['stock'];
                $nuevasStock_2 = Producto::where('id', '=', $valor_2)->update(array($item1b_2 => $valor1b_2));

            }
            //ACTUALIZAR COMPRAS DEL CLIENTE
            $idCliente_2 = $request->get('seleccionarCliente');
            $traerCliente_2 = Cliente::select('*')->where('id', '=', $idCliente_2)->first();
            $item1a_2 = "compras";
            $valor1a_2 = array_sum($totalProductosComprados) + $traerCliente_2['compras'];
            $comprasCliente_2 = Cliente::where('id', '=', $idCliente_2)->update(array($item1a_2 => $valor1a_2));

            $item1b_2 = "ultima_compra";
            $fecha_2 = date('Y-m-d');
            $hora_2 = date('H:i:s');
            $valor1b_2 = $fecha_2 . ' ' . $hora_2;
            $comprasCliente_2 = Cliente::where('id', '=', $idCliente_2)->update(array($item1b_2 => $valor1b_2));
        }

        $todasVentas->codigo = $request->get('editarVenta');
        $todasVentas->id_cliente = $request->get('idClienteVenta');
        $todasVentas->id_vendedor = $request->get('idVendedor');
        $todasVentas->productos = $request->get('listaProductos');
        $todasVentas->impuesto = $request->get('nuevoPrecioImpuesto');
        $todasVentas->neto = $request->get('nuevoPrecioNeto');
        $todasVentas->total = $request->get('total');
        $todasVentas->metodo_pago = $request->get('listaMetodoPago');

        $todasVentas->save();

        return back()->withFlash('Cambios Realizados Exitosamente');
    }


}
