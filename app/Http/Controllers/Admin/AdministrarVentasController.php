<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministrarVentasController extends Controller
{
    public function administrarVentas(){

        return view('admin.ventas.administrar-ventas');
    }

}
