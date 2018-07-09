<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function index(){

        $productos = Producto::all();
        $categorias = Categoria::all();

        return view('admin.productos', compact('productos','categorias'));
    }

    public function store(Request $request){

        $this->validate($request,[

            'id_categoria' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precioCompra' => 'required',
            'precioVenta' => 'required',
            'imagen' => 'required',
            'ventas' => 'required'

        ]);

        $producto = new Producto;

        $producto->id_categoria = $request->get('id_categoria');
        $producto->codigo = $request->get('codigo');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = $request->get('stock');
        $producto->precio_compra = $request->get('precioCompra');
        $producto->precio_venta = $request->get('precioVenta');
        $producto->imagen = $request->get('imagen');
        $producto->ventas = $request->get('ventas');


        $producto->save();

        return back()->with('flash','Producto agregado Correctamente');

    }

    public function update(Producto $producto, Request $request){

        $this->validate($request,[

            'id_categoria' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precioCompra' => 'required',
            'precioVenta' => 'required',
            'ventas' => 'required'

        ]);

        if($request->filled('imagen')){

            $producto->imagen = $request->get('imagen');

        }

        $producto->id_categoria = $request->get('id_categoria');
        $producto->codigo = $request->get('codigo');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = $request->get('stock');
        $producto->precio_compra = $request->get('precioCompra');
        $producto->precio_venta = $request->get('precioVenta');
        $producto->ventas = $request->get('ventas');


        $producto->save();

        return back()->with('flash','Cambios realizados Correctamente');
    }


    public function imagenProducto(Request $request){

        $imagen = $request->file('imagen');
        $imagenUrl = $imagen->store('public/productos');

        return $urlFinal = Storage::url($imagenUrl);
    }

    public function destroy($id){

        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('eliminar', 'Producto Eliminado Correctamente');
    }

    //Funcion para cambiar el codigo del producto dinamicamente
    public function idcategorias($id){

        return $id_categorias = Producto::where('id_categoria',$id)->orderBy('id','desc')->get();
    }

    public function productoEspecifico($id){

        return $producto = Producto::where('id',$id)->with('tipoCategoria')->get();
    }
}
