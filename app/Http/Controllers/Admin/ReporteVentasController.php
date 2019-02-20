<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Venta;

class ReporteVentasController extends Controller
{
    public function reporteVentas(){

        $compradores = Venta::join('clientes', 'clientes.id', '=', 'ventas.id_cliente')
        ->selectRaw("sum(total) as a, clientes.nombre as y")
        ->groupBy('id_cliente')
        ->orderBy('a', 'desc')
        ->limit(10)
        ->get();

        $vendedores = Venta::join('users', 'users.id', '=', 'ventas.id_vendedor')
        ->selectRaw("sum(total) as a, users.name as y")
        ->groupBy('id_vendedor')
        ->orderBy('a', 'desc')
        ->limit(10)
        ->get();

        return view('admin.ventas.reportes-ventas', compact("compradores","vendedores"));
    }

    public function showVentas (Request $request){
        
        $data = Venta::selectRaw('sum(total) as ventas, DATE_FORMAT(created_at, "%Y-%m-%d") as y');
        
        if ($request->get('fechaInicio') && $request->get('fechaFin')) {
            $fi = \Carbon\Carbon::parse($request->get('fechaInicio'))->toDateString();
            $ff = \Carbon\Carbon::parse($request->get('fechaFin'))->toDateString();
            
            if ($fi === $ff){
				$data = Venta::selectRaw('sum(total) as ventas, DATE_FORMAT(created_at, "%Y-%m-%d %HH") as y');
			}
			
            $data = $data->whereDate("created_at",">=",$fi." 00:00:00")->whereDate("created_at", "<=", $ff." 11:59:59");
        }
        
        return json_encode($data->groupBy("y")->get());
    }
}
