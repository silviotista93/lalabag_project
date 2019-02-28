@extends('admin.layout')

@section('header')
    <h1>
        Administrar Productos
        <small>Productos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Productos</a></li>
        <li class="active">Administrar</li>
    </ol>
@stop

@section('contenido')

    <div class="box box-primary">
        <div class="box-header">
            <div class="form-group">
                <h3 class="box-title">Listado de Productos</h3>
                <button class="btn btn-primary pull-right" data-toggle="modal"
                        data-target="#modalAgregarProducto">
                    <i class="fa fa-plus"></i> Crear Producto
                </button>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table id="" class="table table-bordered table-striped tablaproductos">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    {{--<th>Precio de Compra</th>
                    <th>Precio de Venta</th>--}}
                    <th>Agregado</th>
                    <th>Acciones</th>
                </tr>
                </thead>


            </table>
        </div>
    </div>

    <!-- MODAL AGREGAR PRODUCTO -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Crear Producto <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" action="{{route('productoCreado')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <!--ENTRADA PARA SELECCIONAR CATEGORIA -->
                            <div class="form-group {{$errors->has('id_categoria')? 'has-error':''}}">
                                <label for="">Seleccione Categoría</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <select name="id_categoria" id="id_categoria" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($categorias as $categoria)
                                            <option class="text-uppercase"
                                                    {{old('id_categoria')==$categoria->id ? 'selected':''}} value="{{$categoria->id}}">{{$categoria->categoria}}</option>

                                        @endforeach

                                    </select>
                                    {!! $errors->first('id_categoria','<span class="help-block">Seleccione Tipo</span>')!!}
                                </div>
                            </div>
                            <!--ENTRADA PARA EL CÓDIGO -->
                            <div class="form-group {{$errors->has('codigo')? 'has-error':''}}">
                                <label for="">Código</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                    <input id="nuevoCodigo" type="number" name="codigo" class="form-control"
                                           placeholder="" readonly>
                                    {!! $errors->first('codigo','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <!--ENTRADA PARA NOMBRE -->
                            <div class="form-group {{$errors->has('nombre_producto')? 'has-error':''}}">
                                <label for="">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input id="" type="text" name="nombre_producto" class="form-control"
                                           placeholder="Ingresar nombre">
                                    {!! $errors->first('nombre_producto','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <!--ENTRADA PARA DESCRIPCION -->
                            <div class="form-group {{$errors->has('descripcion')? 'has-error':''}}">
                                <label for="">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="5" placeholder="Información o descripción del producto"></textarea>
                                    {!! $errors->first('descripcion','<span class="help-block">*:message</span>')!!}
                            </div>

                            <!--ENTRADA PARA STOCK -->
                            <div class="form-group {{$errors->has('stock')? 'has-error':''}}">
                                <label for="">Stock</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input id="stock" type="number" name="stock" min="0" class="form-control"
                                           placeholder="Stock">
                                    {!! $errors->first('stock','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="row">
                                {{--<div class="col-md-6">
                                    <!--ENTRADA PARA PRECIO COMPRA -->
                                    <div class="form-group {{$errors->has('precioCompra')? 'has-error':''}}">
                                        <label for="">Precio Compra</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                            <input id="precioCompra" type="number" name="precioCompra" min="0"
                                                   class="form-control "
                                                   placeholder="Precio compra">
                                            {!! $errors->first('precioCompra','<span class="help-block">*:message</span>')!!}
                                        </div>
                                    </div>
                                </div>--}}
                                {{--<div class="col-md-6">
                                    <!--ENTRADA PARA PRECIO VENTA -->
                                    <div class="form-group {{$errors->has('precioVenta')? 'has-error':''}}">
                                        <label for="">Precio Venta</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                            <input id="precioVenta" type="number" name="precioVenta" min="0"
                                                   class="form-control"
                                                   placeholder="Precio venta" readonly>
                                            {!! $errors->first('precioVenta','<span class="help-block">*:message</span>')!!}
                                        </div>
                                    </div>
                                    <!--CHECKBOX PARA PORCENTAJES -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>
                                                --}}{{--<input type="checkbox" class="minimal porcentaje" checked>--}}{{--
                                                Porcentaje
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding: 0px;">
                                        <div class="form-group" style="margin-left: 17px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-lg nuevoPorcentaje"
                                                       min="0" value="40">
                                                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>--}}
                            </div>
                            <input type="hidden" name="imagen" value="" id="inputImagen">
                            <input type="hidden" name="ventas" value="0">


                            <!--ENTRADA PARA IMAGEN DEL PRODUCTO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('imagen')? 'has-error':''}}">
                                        <label for="">Subir Imagen</label>
                                        <div class="text-center dropzone dz-clickable" id="f_foto"
                                             style="width: 100%; margin: auto;padding: 0px;">
                                            <div class="text-center dz-default dz-message" data-dz-message=""
                                                 style="margin-top: 0px !important;">
                                                <span><img width="100%" src="/adminlte/img/fondo_archivos.png"></span>
                                            </div>
                                        </div>
                                        {!! $errors->first('imagen','<span class="help-block">*:message</span>')!!}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR PRODUCTO -->
    <div class="modal fade" id="modalEditarProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Editar Producto <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post"  class="myformActualizarproductos">
                    @csrf {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="box-body">
                            <!--ENTRADA PARA SELECCIONAR CATEGORIA -->
                            <!--ENTRADA PARA SELECCIONAR CATEGORIA -->
                            <div class="form-group {{$errors->has('id_categoria')? 'has-error':''}}">
                                <label for="">Categoría</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <select name="id_categoria" class="form-control" readonly>
                                        @foreach($categorias as $categoria)
                                        <option id="editarCategoria" value="" {{ old('id_categoria',$categoria->id) == $categoria->id ? 'selected':''}}>{{$categoria->categoria}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('id_categoria','<span class="help-block">Seleccione Tipo</span>')!!}
                                </div>
                            </div>
                            <!--ENTRADA PARA EL CÓDIGO -->
                            <div class="form-group {{$errors->has('codigo')? 'has-error':''}}">
                                <label for="">Código</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                    <input id="editarCodigo" type="number" name="codigo" class="form-control"
                                           placeholder="" readonly>
                                    {!! $errors->first('codigo','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <!--ENTRADA PARA NOMBRE -->
                            <div class="form-group {{$errors->has('nombre_producto')? 'has-error':''}}">
                                <label for="">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input id="editarNombre" type="text" name="nombre_producto" class="form-control"
                                           placeholder="">
                                    {!! $errors->first('nombre_producto','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <!--ENTRADA PARA DESCRIPCION -->
                            <div class="form-group {{$errors->has('descripcion')? 'has-error':''}}">
                                <label for="">Descripción</label>
                                    <textarea class="form-control" id="editarDescripcion" name="descripcion" rows="5" placeholder="Información o descripción del producto"></textarea>
                                    {!! $errors->first('descripcion','<span class="help-block">*:message</span>')!!}
                            </div>

                            <!--ENTRADA PARA STOCK -->
                            <div class="form-group {{$errors->has('stock')? 'has-error':''}}">
                                <label for="">Stock</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input id="editarStock" type="number" name="stock" min="0" class="form-control"
                                           placeholder="Stock">
                                    {!! $errors->first('stock','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="row">
                                {{--<div class="col-md-6">
                                    <!--ENTRADA PARA PRECIO COMPRA -->
                                    <div class="form-group {{$errors->has('precioCompra')? 'has-error':''}}">
                                        <label for="">Precio Compra</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                            <input id="editarPrecioCompra" type="number" name="precioCompra" min="0"
                                                   class="form-control"
                                                   placeholder="Precio compra">
                                            {!! $errors->first('precioCompra','<span class="help-block">*:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--ENTRADA PARA PRECIO VENTA -->
                                    <div class="form-group {{$errors->has('precioVenta')? 'has-error':''}}">
                                        <label for="">Precio Venta</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                            <input id="editarPrecioVenta" type="number" name="precioVenta" min="0"
                                                   class="form-control"
                                                   placeholder="Precio venta" readonly>
                                            {!! $errors->first('precioVenta','<span class="help-block">*:message</span>')!!}
                                        </div>
                                    </div>
                                    <!--CHECKBOX PARA PORCENTAJES -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>
                                                --}}{{--<input type="checkbox" class="minimal porcentaje" checked>--}}{{--
                                                Porcentaje
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding: 0px;">
                                        <div class="form-group" style="margin-left: 17px;">
                                            <div class="input-group">
                                                <input type="number" class="form-control input-lg nuevoPorcentaje "
                                                       id="editarPorcentaje"
                                                       min="0" value="40">
                                                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>--}}
                            </div>
                            <input type="hidden" name="imagen" value="" id="inputImagenEditar">
                            <input type="hidden" name="ventas" value="0">


                            <!--ENTRADA PARA IMAGEN DEL PRODUCTO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('imagen')? 'has-error':''}}">
                                        <label for="">Click en la imagen para Actualizar</label>
                                        <div class="text-center dropzone dz-clickable" id="dropzoneEditar"
                                             style="width: 100%; margin: auto;padding: 0px;">
                                            <div class="text-center dz-default dz-message" data-dz-message=""
                                                 style="margin-top: 0px !important;">
                                                <span><img width="100%" id="editarImagenProducto" src=""></span>
                                            </div>
                                        </div>
                                        {!! $errors->first('imagen','<span class="help-block">*:message</span>')!!}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        new Dropzone('.dropzone', {

            url: '{{route('imagenProducto')}}',
            acceptedFiles: 'image/*',
            paramName: 'imagen',
            maxFiles: 1,

            headers: {

                'X-CSRF-TOKEN': '{{csrf_token()}}'

            },

            success: function (file, response) {

                $('#inputImagen').val(response);
            }

        });

        Dropzone.autoDiscover = false;

        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });

    </script>
@endsection

@section('validacionProductos')
    <script>
        @if(Request::url() === route('productos'))

        @if (count($errors) > 0)
        $('#modalAgregarProducto').modal('show');
        @endif
        @endif
    </script>

@endsection
<!-- TABLA DINAMICA PRODUCTOS-->
@section('dataTablesProductos')

    <script>
        var table = $('.tablaproductos').DataTable({
            "processing": true,
            "serverSide": true,
            "data": null,
            "ajax": "/api/productos",
            "columns": [

                {data: 'id'},
                {
                    render: function (data, type, JsonResultRow, meta) {
                        return '<img src="' + JsonResultRow.imagen + '" width="40px" />';
                    }
                },
                {data: 'codigo'},
                {data: 'nombre'},
                {data: 'tipo_categoria.categoria'},
                {data: 'stock'},
                /*{data: 'precio_compra'},
                {data: 'precio_venta'},*/
                {data: 'created_at'},
                {
                    defaultContent: '\n' +
                    '                            <button class="btn btn-xs btn-info btnEditarProducto" idproducto="" id=""\n' +
                    '                                    ="" data-toggle="modal"\n' +
                    '                                    data-target="#modalEditarProductos"><i class="fa fa-pencil"></i></button>\n' +
                    '                            <form class="myformProductos" action=""\n' +
                    '                                  method="POST" style="display: inline;">\n' +
                    '                                @csrf' +
                    '                                <input type="hidden" name="_method" value="DELETE">\n' +
                    '\n' +
                    '                                <a class="btn btn-xs btn-danger eliminarProducto"><i class="fa fa-times"></i></a>\n' +
                    '\n' +
                    '                            </form>'
                }


            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }

        });

        //ACTIVAR BOTONES CON SU ID CORRESPONDIENTE

        //Eliminar producto
        $('.tablaproductos tbody').on('click', '.eliminarProducto', function () {
            var data = table.row($(this).parents('tr')).data();
            $(this).attr('producto', data.id);

            var formularioEliminarProducto = $('.myformProductos');
            var url = '/producto-eliminar/' + data.id + '';

            formularioEliminarProducto.attr('action', url);

            $.confirm({
                animationBounce: 1.5,
                closeAnimation: 'scale',
                icon: 'fa fa-warning',
                title: 'Esta seguro que desea eliminar!',
                content: 'Este Producto se eliminara de la base de datos',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Eliminar',
                        btnClass: 'btn-red',
                        action: function () {
                            $(".myformProductos").submit();
                        }
                    },

                    cerrar: function () {
                    }
                }
            });
        });
        //Editar producto
        $('.tablaproductos tbody').on('click', '.btnEditarProducto', function () {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $('#editarCodigo').val(data.codigo);
            $('#editarNombre').val(data.nombre);
            $('#editarDescripcion').val(data.descripcion);
            $('#editarStock').val(data.stock);
            $('#editarPrecioCompra').val(data.precio_compra);
            $('#editarPrecioVenta').val(data.precio_venta);
            $('#editarImagenProducto').attr('src', data.imagen);
            $('#editarCategoria').val(data.id_categoria);

            var formularioActualizarProducto = $('.myformActualizarproductos');
            var url = '/producto-actualizado/'+data.id+''

            formularioActualizarProducto.attr('action', url);
        });

    </script>

@endsection
@section('editarImagenProducto')
    <script>
        new Dropzone('#dropzoneEditar', {

            url: '{{route('imagenProducto')}}',
            acceptedFiles: 'image/*',
            paramName: 'imagen',
            maxFiles: 1,

            headers: {

                'X-CSRF-TOKEN': '{{csrf_token()}}'

            },

            success: function (file, response) {

                $('#inputImagenEditar').val(response);
            }

        });

        Dropzone.autoDiscover = false;
    </script>
@endsection
