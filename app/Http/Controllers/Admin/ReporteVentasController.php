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
        ->get();

        $vendedores = Venta::join('users', 'users.id', '=', 'ventas.id_vendedor')
        ->selectRaw("sum(total) as a, users.name as y")
        ->groupBy('id_vendedor')
        ->get();

        return view('admin.ventas.reportes-ventas', compact("compradores","vendedores"));
    }

    public function showProyect (Request $request){
		
        $data = Project::select(array(
            DB::raw('count(id) as a, DATE_FORMAT(created_at, "%Y-%m-%d") as y')
        ))->where('status',Project::REVISION);
        
        if ($request->get('fechaInicio') && $request->get('fechaFin')) {
            $fi = \Carbon\Carbon::parse($request->get('fechaInicio'))->toDateString();
            $ff = \Carbon\Carbon::parse($request->get('fechaFin'))->toDateString();
            
            if ($fi === $ff){
				$data = Project::select(array(
					DB::raw('count(id) as a, DATE_FORMAT(created_at, "%Y-%m-%d %HH") as y')
				))->where('status',Project::REVISION);
			}
			
            $data = $data->whereDate("created_at",">=",$fi." 00:00:00")->whereDate("created_at", "<=", $ff." 11:59:59");
        }
        
        return json_encode($data->groupBy("y")->get());
    }
}
