<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteVentasController extends Controller
{
    public function reporteVentas(){


        return view('admin.ventas.reportes-ventas');
    }
}
