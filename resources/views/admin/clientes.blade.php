@extends('admin.layout')

@section('header')
    <h1>
        Administrar Clientes
        <small>Clientes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Clientes</a></li>
        <li class="active">Administrar</li>
    </ol>

@stop
@section('contenido')
    <div class="box box-primary">
        <div class="box-header">
            <div class="form-group">
                <h3 class="box-title">Listado de Clientes</h3>
                <button class="btn btn-primary pull-right" data-toggle="modal"
                        data-target="#modalAgregarCliente">
                    <i class="fa fa-plus"></i> Agregar Cliente
                </button>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table id="" class="table table-bordered table-striped tabla_clientes">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Id Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Total Compras</th>
                    <th>Última Compra</th>
                    <th>Ingreso al Sistema</th>
                    <th>Acciones</th>


                </tr>
                </thead>


            </table>
        </div>
    </div>

    <!-- MODAL AGREGAR CLIENTE -->
    <div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Agregar Cliente <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" action="{{route('clienteAgregado')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group {{$errors->has('nombre')? 'has-error':''}}">
                                <label for="">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre y apellidos">
                                    {!! $errors->first('nombre','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('documento')? 'has-error':''}}">
                                <label for="">Documento</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="number" name="documento" class="form-control"
                                           placeholder="Ingrese documento">
                                    {!! $errors->first('documento','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Ingrese Email">
                                    {!! $errors->first('email','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('telefono')? 'has-error':''}}">
                                <label for="">Teléfono</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="telefono" class="form-control"
                                           data-inputmask='"mask": "(999) 999-9999"'
                                           data-mask placeholder="Ingrese teléfono">
                                    {!! $errors->first('telefono','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('direccion')? 'has-error':''}}">
                                <label for="">Dirección</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="direccion" class="form-control" placeholder="Ingrese dirección">
                                    {!! $errors->first('direccion','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('fecha_nacimiento')? 'has-error':''}}">
                                <label for="">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker_clientes" name="fecha_nacimiento"
                                           id="" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                    {!! $errors->first('fecha_nacimiento','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <input type="text" hidden value="0" name="compras">

                            {{--<div class="form-group">
                                <div class="row">
                                    <div class="col-md-8 text-center">

                                        <div class="text-center dropzone dz-clickable" id="f_foto"
                                             style="width: 100%; margin: auto;">
                                            <div class="text-center dz-default dz-message" data-dz-message=""
                                                 style="margin-top: -13px !important;">
                                                <span><img width="100%" src="/adminlte/img/fondo_perfil.png"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>--}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR CLIENTE -->
    <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Editar Cliente <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" action="" class="myformActualizarcliente">
                    @csrf  {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group {{$errors->has('nombre')? 'has-error':''}}">
                                <label for="">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre y apellidos" id="editarNombreCliente">
                                    {!! $errors->first('nombre','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('documento')? 'has-error':''}}">
                                <label for="">Documento</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="number" name="documento" class="form-control"
                                           placeholder="Ingrese documento" id="editarDocumentoCliente">
                                    {!! $errors->first('documento','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Ingrese Email" id="editarEmailCliente">
                                    {!! $errors->first('email','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('telefono')? 'has-error':''}}">
                                <label for="">Teléfono</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="telefono" class="form-control"
                                           data-inputmask='"mask": "(999) 999-9999"'
                                           data-mask placeholder="Ingrese teléfono" id="editarTelefonoCliente">
                                    {!! $errors->first('telefono','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('direccion')? 'has-error':''}}">
                                <label for="">Dirección</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="direccion" class="form-control" placeholder="Ingrese dirección" id="editarDireccionCliente" >
                                    {!! $errors->first('direccion','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('fecha_nacimiento')? 'has-error':''}}">
                                <label for="">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker_clientes" name="fecha_nacimiento" id="editarFecha_nacimientoCliente">
                                    {!! $errors->first('fecha_nacimiento','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <input type="text" hidden value="0" name="compras">

                            {{--<div class="form-group">
                                <div class="row">
                                    <div class="col-md-8 text-center">

                                        <div class="text-center dropzone dz-clickable" id="f_foto"
                                             style="width: 100%; margin: auto;">
                                            <div class="text-center dz-default dz-message" data-dz-message=""
                                                 style="margin-top: -13px !important;">
                                                <span><img width="100%" src="/adminlte/img/fondo_perfil.png"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>--}}
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

    <!-- MODAL VER CLIENTE -->
    <div class="modal fade" id="modalVerCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Informacion del Cliente <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" action="" class="myformActualizarcliente">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group {{$errors->has('nombre')? 'has-error':''}}">
                                <label for="">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre y apellidos" id="verNombreCliente" readonly>
                                    {!! $errors->first('nombre','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('documento')? 'has-error':''}}">
                                <label for="">Documento</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="number" name="documento" class="form-control"
                                           placeholder="Ingrese documento" id="verDocumentoCliente" readonly>
                                    {!! $errors->first('documento','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Ingrese Email" id="verEmailCliente" readonly>
                                    {!! $errors->first('email','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('telefono')? 'has-error':''}}">
                                <label for="">Teléfono</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="telefono" class="form-control"
                                           data-inputmask='"mask": "(999) 999-9999"'
                                           data-mask placeholder="Ingrese teléfono" id="verTelefonoCliente" readonly>
                                    {!! $errors->first('telefono','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('direccion')? 'has-error':''}}">
                                <label for="">Dirección</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="direccion" class="form-control" placeholder="Ingrese dirección" id="verDireccionCliente" readonly >
                                    {!! $errors->first('direccion','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('fecha_nacimiento')? 'has-error':''}}">
                                <label for="">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="fecha_nacimiento" id="verFecha_nacimientoCliente" readonly>
                                    {!! $errors->first('fecha_nacimiento','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <input type="text" hidden value="0" name="compras">

                            {{--<div class="form-group">
                                <div class="row">
                                    <div class="col-md-8 text-center">

                                        <div class="text-center dropzone dz-clickable" id="f_foto"
                                             style="width: 100%; margin: auto;">
                                            <div class="text-center dz-default dz-message" data-dz-message=""
                                                 style="margin-top: -13px !important;">
                                                <span><img width="100%" src="/adminlte/img/fondo_perfil.png"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>--}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            $('[data-mask]').inputmask();
            $('.datepicker_clientes').datepicker({
                autoclose: true
            });

          var table = $('.tabla_clientes').DataTable({
                "processing": true,
                "serverSide": true,
                "data": null,
                "ajax": "/api/clientes",
                "columns":[

                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'documento'},
                    {data: 'email'},
                    {data: 'telefono'},
                    {data: 'compras'},
                    {defaultContent:'0'},
                    {data: 'created_at'},
                    {defaultContent:'<button href="#" class="btn btn-xs btn-default btnVerCliente" data-target="#modalVerCliente" data-toggle="modal"><i class="fa fa-eye"></i></button>\n' +
                        '                            <button class="btn btn-xs btn-info btnEditarCliente" idproducto="" id=""\n' +
                        '                                    ="" data-toggle="modal"\n' +
                        '                                    data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>\n' +
                        '                            <form class="myformCliente" action=""\n' +
                        '                                  method="POST" style="display: inline;">\n' +
                        '                                @csrf' +
                        '                                <input type="hidden" name="_method" value="DELETE">\n' +
                        '\n' +
                        '                                <a class="btn btn-xs btn-danger eliminarCliente"><i class="fa fa-times"></i></a>\n' +
                        '\n' +
                        '                            </form>'}


                ],
                "language":{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
            //ACTIVAR BOTONES CON SU ID CORRESPONDIENTE

            //Eliminar cliente
            $('.tabla_clientes tbody').on('click','.eliminarCliente',function () {
                var data = table.row( $(this).parents('tr') ).data();

                var formularioEliminarCliente = $('.myformCliente');
                var url = 'http://inventario.mauro/cliente-eliminar/'+data.id+'';

                formularioEliminarCliente.attr('action',url);

                $.confirm({
                    animationBounce: 1.5,
                    closeAnimation: 'scale',
                    icon: 'fa fa-warning',
                    title: 'Esta seguro que desea eliminar!',
                    content: 'El Cliente se eliminara de la base de datos',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Eliminar',
                            btnClass: 'btn-red',
                            action: function(){
                                $(".myformCliente").submit();
                            }
                        },

                        cerrar: function () {
                        }
                    }
                });
            });

            //Ver cliente
            $('.tabla_clientes tbody').on('click','.btnEditarCliente',function () {
                var data = table.row($(this).parents('tr')).data();
                console.log(data);

                $('#editarNombreCliente').val(data.nombre);
                $('#editarDocumentoCliente').val(data.documento);
                $('#editarEmailCliente').val(data.email);
                $('#editarTelefonoCliente').val(data.telefono);
                $('#editarDireccionCliente').val(data.direccion);
                $('#editarFecha_nacimientoCliente').val(data.fecha_nacimiento);



                var formularioActualizarCliente = $('.myformActualizarcliente');
                var url = 'http://inventario.mauro/cliente-actualizado/'+data.id+'';

                formularioActualizarCliente.attr('action',url);
            });
            //Editar producto
            $('.tabla_clientes tbody').on('click','.btnVerCliente',function () {
                var data = table.row($(this).parents('tr')).data();
                console.log(data);

                $('#verNombreCliente').val(data.nombre);
                $('#verDocumentoCliente').val(data.documento);
                $('#verEmailCliente').val(data.email);
                $('#verTelefonoCliente').val(data.telefono);
                $('#verDireccionCliente').val(data.direccion);
                $('#verFecha_nacimientoCliente').val(data.fecha_nacimiento);


            });

        </script>
        @endsection


@stop