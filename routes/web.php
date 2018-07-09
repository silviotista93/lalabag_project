<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['namespace'=>'Admin','middleware' => 'auth' ],function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    // Rutas Usuario...
    Route::get('usuarios','UserController@index')->name('usuarios');
    Route::post('usuario-creado','UserController@store')->name('usuarioCreado');
    Route::put('usuario-update/{user}','UserController@update')->name('actualizarUsuario');
    Route::put('update-estado/{usuario}/{estado}','UserController@actualizarEstado')->name('actualizarEstado');
    Route::delete('usuario-eliminar/{usuario}','UserController@destroy')->name('usuarioEliminar');

    Route::post('usuario-foto','UserController@fotoPerfil')->name('fotoPerfil');
    Route::put('update-perfil/{user}','UserController@updatePerfil')->name('actualizarPerfil');

    // Rutas Categorias...
    Route::get('categorias','CategoriasController@index')->name('categorias');
    Route::post('categoria-creada','CategoriasController@store')->name('categoriaCreada');
    Route::put('categoria-update/{categoria}','CategoriasController@update')->name('actualizarCategoria');
    Route::delete('categoria-eliminar/{id}','CategoriasController@destroy')->name('categoriaEliminar');


    // Rutas Productos...
    Route::get('productos','ProductosController@index')->name('productos');
    Route::post('producto-agregado','ProductosController@store')->name('productoCreado');
    Route::put('producto-actualizado/{producto}','ProductosController@update')->name('productoActualizado');
    Route::post('imagen-producto','ProductosController@imagenProducto')->name('imagenProducto');
    Route::delete('producto-eliminar/{id}','ProductosController@destroy')->name('productoEliminar');

    // Rutas Clientes...
    Route::get('clientes','ClientesController@index')->name('clientes');
    Route::post('cliente-agregado','ClientesController@store')->name('clienteAgregado');
    Route::put('cliente-actualizado/{cliente}','ClientesController@update')->name('clienteActualizado');
    Route::delete('cliente-eliminar/{id}','ClientesController@destroy')->name('clienteEliminar');

    // Rutas Ventas...

    // Administrar Ventas...
    Route::get('ventas/administrar-ventas','AdministrarVentasController@administrarVentas')->name('adminis-ventas');

    // Crear Ventas...
    Route::get('ventas/crear-ventas','CrearVentasController@crearVentas')->name('crear-ventas');


    Route::get('ventas/reportes-ventas','ReporteVentasController@reporteVentas')->name('reportes-ventas');


    // Renderizar tablas...
    Route::get('api/productos',function (){
        return datatables()->of(\App\Producto::with('tipoCategoria')->get())->toJson();
    });
    Route::get('api/clientes',function (){
        return datatables()->of(\App\Cliente::all())->toJson();
    });
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


