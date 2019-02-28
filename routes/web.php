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
Route::get('/productos/{id}', function($id){
    $categoria = \App\Producto::where('id_categoria',$id)->get();
    return $categoria;
});

Route::get('ruta-consultas/{codigo}',function ($codigo){
    return \App\Venta::where('codigo',$codigo)->with('ventas_cliente','ventas_vendedor')->first();
});

Route::group(['namespace'=>'Admin','middleware' => 'login' ],function (){
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
    Route::post('venta-creada','CrearVentasController@crearVenta')->name('venta-creada');

    // Editar Ventas...
    Route::get('ventas/editar-ventas/{id}','CrearVentasController@editar_venta_index')->name('editar-ventas');
    Route::put('ventas/cambios-realizado/{todasVentas}','CrearVentasController@editarVenta')->name('cambios-ventas');

    //Eliminar Venta
    Route::delete('venta-eliminar/{id}','AdministrarVentasController@eliminarVenta')->name('eliminar-venta');

    //Reporte Ventas
    Route::get('ventas/reportes-ventas','ReporteVentasController@reporteVentas')->name('reportes-ventas');
    Route::post("ventas/grafica-ventas", 'ReporteVentasController@showVentas')->name("grafica-ventas");

    // Renderizar tablas...
    Route::get('api/productos',function (){
        return datatables()->of(\App\Producto::with('tipoCategoria')->get())->toJson();
    });

    Route::get('tabla-ventas','AdministrarVentasController@listarTabla')->name('tabla-ventas');

    Route::get('api/clientes',function (){
        return datatables()->of(\App\Cliente::all())->toJson();
    });

    //Imprimir Recibo
    Route::get('ventas/recibo/{codigo}','FacturaController@recibo')->name('recibo');
});

Route::group(['namespace'=>'Frontend' ],function (){
    Route::get('/','HomeControler@index')->name('home');

    Route::get('/login-registro','LoginRegisController@index')->name('login.registro');

    Route::get('/perfil','ProfileController@index')->name('profile')->middleware('cliente');
});



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


