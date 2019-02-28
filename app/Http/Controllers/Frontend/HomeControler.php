<?php

namespace App\Http\Controllers\Frontend;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeControler extends Controller
{
    public function index(){
        $productos = Producto::with('tipoCategoria')->get();
        return view('frontend.home.home', compact('productos'));
    }
}
