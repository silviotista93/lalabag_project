<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $roles = Role::all();
        $editarRol = Role::pluck('name', 'id');

        return view('admin.usuarios',compact('usuarios','roles','editarRol'));
    }

    public function store(Request $request){

        //Validar Formulario Crear Usuario

        $rule = [
            'name'      => 'required|string|max:255',
            'apellidos' => 'required',
            'email'     => 'required|string|email|max:255|unique:users',
            'telefono'  => 'required',
            'foto'   => 'required',

            ];
        $data = $request->validate($rule);
        $pass  = str_random(8);//Primero hay que llamar la funcion de encriptar en el modelo usuario

        $data['password'] = $pass;
        $user = User::create($data);
        $user->assignRole($request->rol);

        return back()->withFlash('Empleado Creado');

    }

    public function update(Request $request, User $user){

        $data = $request->validate([

            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono' => 'required',

        ]);

        $user->update($data);

        return back()->withFlash('Usuario Actualizado');
    }

    public function updatePerfil(Request $request, User $user){
        $this->validate($request,[

            'foto' => '',
            'password' => 'confirmed', 'min:6',

        ]);

        if ($request->filled('foto') & $request->filled('password') ){
            $user->foto = $request->get('foto');
            $user->password = $request->get('password');
            $user->save();
            return back()->with('flash', 'Perfil Actualizado Correctamente');
        }elseif ($request->filled('foto')){
            $user->foto = $request->get('foto');
            $user->save();
            return back()->with('flash', 'Perfil Actualizado Correctamente');
        }elseif($request->filled('password')){
            $user->password = $request->get('password');
            $user->save();
            return back()->with('flash', 'Perfil Actualizado Correctamente');
        }else{

            return back()->with('eliminar', 'No cambios');
        }

    }

    public function fotoPerfil(Request $request){

        $foto = $request->file('foto');
        $fotoUrl = $foto->store('public/usuarios');

        return $urlFinal = Storage::url($fotoUrl);
    }


    public function destroy($id){

        $usuario = User::findOrFail($id);

        $usuario->delete();

        return back()->with('eliminar', 'Usuario Eliminado Correctamente');
    }


    public function actualizarEstado(Request $request, User $usuario, $estado){
        if ($estado === "activo"){
            $usuario->estado = "activo";
        }else if ($estado == "inactivo"){
            $usuario->estado = "inactivo";
        }else{
            return false;
        }
        return json_encode($usuario->update());
    }
}
