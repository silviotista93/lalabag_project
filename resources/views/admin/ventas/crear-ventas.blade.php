@extends('admin.layout')

@section('header')
    <h1>
        Crear Ventas
        <small>Ventas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Crear Ventas</a></li>
        <li class="active">Administrar</li>
    </ol>
@stop

@section('contenido')

    <div class="row">

        <!--=====================================
        EL FORMULARIO
        ======================================-->

        <div class="col-lg-5 col-xs-12">

            <div class="box box-success">

                <div class="box-header">
                    <div class="form-group">
                        <h3 class="box-title">Venta</h3>
                    </div>
                </div>

                <form role="form" method="post" class="formularioVenta">

                    <div class="box-body">

                        <div class="box">

                            <!--=====================================
                            ENTRADA DEL VENDEDOR
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                    <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor"
                                           value="{{auth()->user()->name}} {{auth()->user()->apellidos}}" readonly>
                                    <input type="hidden" name="idVendedor" value="{{auth()->user()->id}}">

                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA DEL VENDEDOR
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    @if(isset($ventas))
                                        <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta"
                                               value="10001" readonly>
                                    @else
                                        @foreach($ventas as $venta)

                                            @php($codigo = $venta->codigo+1)
                                            <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta"
                                                   value="{{$codigo}}" readonly>
                                        @endforeach
                                    @endif

                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA DEL CLIENTE
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente"
                                            required>

                                        <option value="">Seleccionar cliente</option>
                                        @foreach($clientes as $cliente)
                                            <option class="text-uppercase"
                                                    {{old('seleccionarCliente')==$cliente->id ? 'selected':''}} value="{{$cliente->id}}">{{$cliente->nombre}}</option>

                                        @endforeach

                                    </select>

                                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs"
                                                                            data-toggle="modal"
                                                                            data-target="#modalAgregarClienteVenta"
                                                                            data-dismiss="modal">Agregar cliente</button></span>

                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA PARA AGREGAR PRODUCTO
                            ======================================-->

                            <div class="form-group row nuevoProducto">



                            </div>

                            <!--=====================================
                            BOTÓN PARA AGREGAR PRODUCTO
                            ======================================-->

                            <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

                            <hr>

                            <div class="row">

                                <!--=====================================
                                ENTRADA IMPUESTOS Y TOTAL
                                ======================================-->

                                <div class="col-xs-8 pull-right">

                                    <table class="table">

                                        <thead>

                                        <tr>
                                            <th>Impuesto</th>
                                            <th>Total</th>
                                        </tr>

                                        </thead>

                                        <tbody>

                                        <tr>

                                            <td style="width: 50%">

                                                <div class="input-group">

                                                    <input type="number" class="form-control" min="0"
                                                           id="nuevoImpuestoVenta" name="nuevoImpuestoVenta"
                                                           placeholder="0" required>
                                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                                </div>

                                            </td>

                                            <td style="width: 50%">

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i
                                                                class="ion ion-social-usd"></i></span>

                                                    <input type="number" min="1" class="form-control"
                                                           id="nuevoTotalVenta" name="nuevoTotalVenta"
                                                           placeholder="00000" readonly required>


                                                </div>

                                            </td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <hr>

                            <!--=====================================
                            ENTRADA MÉTODO DE PAGO
                            ======================================-->

                            <div class="form-group row">

                                <div class="col-xs-6" style="padding-right:0px">

                                    <div class="input-group">

                                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago"
                                                required>
                                            <option value="">Seleccione método de pago</option>
                                            <option value="efectivo">Efectivo</option>
                                            <option value="tarjetaCredito">Tarjeta Crédito</option>
                                            <option value="tarjetaDebito">Tarjeta Débito</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="col-xs-6" style="padding-left:0px">

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="nuevoCodigoTransaccion"
                                               name="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                    </div>

                                </div>

                            </div>

                            <br>

                        </div>

                    </div>

                    <div class="box-footer">

                        <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

                    </div>

                </form>

            </div>

        </div>

        <!--=====================================
        LA TABLA DE PRODUCTOS
        ======================================-->

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

            <div class="box box-warning">

                <div class="box-header">
                    <div class="form-group">
                        <h3 class="box-title">Productos</h3>
                    </div>
                </div>


                <div class="box-body">

                    <table class="table table-bordered table-striped dt-responsive tabla_producto_venta">

                        <thead>

                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>

                        </thead>

                        <tbody>


                    </table>

                </div>

            </div>


        </div>

    </div>

    <!-- MODAL AGREGAR CLIENTE -->
    <div class="modal fade " id="modalAgregarClienteVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                    <input type="text" name="nombre" class="form-control"
                                           placeholder="Ingrese nombre y apellidos">
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
                                    <input type="text" name="direccion" class="form-control"
                                           placeholder="Ingrese dirección">
                                    {!! $errors->first('direccion','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('fecha_nacimiento')? 'has-error':''}}">
                                <label for="">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker_clientes"
                                           name="fecha_nacimiento"
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


@section('js')
    <script>
        var table = $('.tabla_producto_venta').DataTable({
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
                {data: 'descripcion'},
                {
                    render: function (data, type, JsonResultRow, meta) {

                        return '<div class="btn-group"><button class="btn btn-success limiteStock">' + JsonResultRow.stock + '</button></div>'
                    }
                },
                {
                    defaultContent: '<div class="btn-group">\n' +
                    '                      <button type="button"  class="recuperarBoton btn btn-primary agregarProducto " idProducto>Agregar</button> \n' +
                    '                    </div>'
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


        function limiteStock() {

            var limiteStock = $('.limiteStock');
            for (var i = 0; i < limiteStock.length; i++) {
                var data = table.row($(limiteStock[i]).parents('tr')).data();
                if (data.stock <= 10) {
                    $(limiteStock[i]).addClass('btn-danger');
                    $(limiteStock[i]).html(data.stock);
                } else if (data.stock > 11 && data.stock <= 15) {
                    $(limiteStock[i]).addClass('btn-warning');
                    $(limiteStock[i]).html(data.stock);
                } else {
                    $(limiteStock[i]).addClass('btn-success');
                    $(limiteStock[i]).html(data.stock);
                }
            }
        }

        setTimeout(function () {
            limiteStock();
        }, 300);


        $('[data-mask]').inputmask();
        $('.datepicker_clientes').datepicker({
            autoclose: true
        });
    </script>
@endsection

@stop