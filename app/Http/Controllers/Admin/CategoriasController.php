<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Requests\CategoriaStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    public function index(){

        $categorias = Categoria::all();

        return view('admin.categorias',compact('categorias'));
    }

    public function store(CategoriaStoreRequest $request){

        $categoria = new Categoria;

        $categoria->categoria = $request->get('categoria');
        $categoria->save();

        return back()->with('flash', 'Categoria Creada Correctamente');
    }

    public function update(Request $request, Categoria $categoria){

        $data = $request->validate([

            'categoria' => 'required',
        ]);

        $categoria->update($data);

        return back()->withFlash('Categoria Actualizada');
    }

    public function destroy($id){

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return back()->with('eliminar', 'Categoria Eliminada Correctamente');
    }
}
