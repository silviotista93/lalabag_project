<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller
{
    public function index(){

        $clientes = Cliente::all();

        return view('admin.clientes', compact('clientes'));
    }

    public function store(Request $request){

        $this->validate($request,[

            'nombre' => 'required',
            'documento' => 'required',
            'email'     => 'required|string|email|max:255|unique:users',
            'telefono' => 'required',
            'direccion' => 'required',
            'compras' => 'required',

        ]);

        $cliente = new Cliente;

        $cliente->nombre = $request->get('nombre');
        $cliente->documento = $request->get('documento');
        $cliente->email = $request->get('email');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->fecha_nacimiento = $request->get('fecha_nacimiento') ? Carbon::parse($request->get('fecha_nacimiento')) : null;
        $cliente->compras = $request->get('compras');

        $cliente->save();

        return back()->with('flash','Cliente agregado Correctamente');
    }

    public function update(Cliente $cliente, Request $request){

        $this->validate($request,[

            'nombre' => 'required',
            'documento' => 'required',
            'email'     => 'required|string|email|max:255|unique:users',
            'telefono' => 'required',
            'direccion' => 'required',
            'compras' => 'required',
            'fecha_nacimiento' => ''

        ]);

        $cliente->nombre = $request->get('nombre');
        $cliente->documento = $request->get('documento');
        $cliente->email = $request->get('email');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->fecha_nacimiento = $request->get('fecha_nacimiento') ? Carbon::parse($request->get('fecha_nacimiento')) : null;
        $cliente->compras = $request->get('compras');

        $cliente->save();

        return back()->with('flash','Cambios realizados Correctamente');

    }

    public function destroy($id){

        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return back()->with('eliminar','Cliente eliminado Correctamente');
    }
}
