@extends('admin.layout')

@section('header')
    <h1>
        Administrar Ventas
        <small>Ventas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ventas</a></li>
        <li class="active">Administrar</li>
    </ol>
@stop

@section('contenido')
    <div class="box box-primary">

        <div class="box-header">
            <div class="form-group">
                <a href="{{route('crear-ventas')}}">
                    <button class="btn btn-primary pull-left" data-toggle="modal"
                            data-target="#modalAgregarCliente">
                        <i class="fa fa-plus"></i> Agregar Venta
                    </button>
                </a>
                <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span><i class="fa fa-calendar"></i> Rango de Fecha</span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>
        </div>

        <div class="box-body table-responsive ">
            <table class="table table-bordered table-striped dt-responsive tablas tablaVentas">
                <thead>
                <tr>
                    <th>Código factura</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Forma de pago</th>
                    <th>Neto</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>

                </thead>



            </table>

        </div>

    </div>
@section('dataTablesVentas')
    <script>
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Hoy'       : [moment(), moment()],
                    'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
                    'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                    'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
                    'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                var fechaInicial = start.format('YYYY-M-D');
                var fechaFinal = end.format('YYYY-M-D');

                var capturarRango = $('#daterange-btn span').html();

                localStorage.setItem('capturarRango',capturarRango);


            }
        );

        //Cancelar Rango de Fechas
        $('.daterangepicker .range_inputs .cancelBtn').on('click',function () {
            localStorage.removeItem('capturarRango');
            localStorage.clear();
            window.location = '/ventas/administrar-ventas/'
        });

        var tablaVentas = $('.tablaVentas').DataTable({

            "processing": true,
            "serverSide": true,
            "data": null,
            "ajax": "/tabla-ventas",
            "columns":[
                {data: 'codigo'},
                {data: 'ventas_cliente.nombre'},
                {render:function (data,type, JsonResultRow,meta) {
                        return '<p>'+JsonResultRow.ventas_vendedor.name+' '+JsonResultRow.ventas_vendedor.apellidos+'</p>'
                    }},
                {data: 'metodo_pago'},
                {data: 'neto'},
                {data: 'total'},
                {data: 'created_at'},

                {defaultContent:'\n' +
                    '                            <a idUsuario="" class="btn btn-xs btn-warning editarVenta"><i class="fa fa-pencil"></i></a>\n'+
                    '                              <a  class="btn btn-xs btn-success imprimirRecibo" data-toggle="modal"><i class="fa fa-print"></i></a>'+
                    '                            <form class="formEliminarVenta" action=""\n' +
                    '                                  method="POST" style="display: inline;">\n' +
                    '                                @csrf' +
                    '                                <input type="hidden" name="_method" value="DELETE">\n' +
                    '\n' +
                    '                                <a idVenta="" class="btn btn-xs btn-danger eliminarVenta"><i class="fa fa-times"></i></a>\n' +
                    '\n' +
                    '                            </form>'
                }
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

        //Eliminar Venta
        $('.tablaVentas tbody').on('click','.eliminarVenta',function () {
            var data = tablaVentas.row( $(this).parents('tr') ).data();
            console.log(data);
            $(this).attr('producto', data.id);

            var formularioEliminarVenta = $('.formEliminarVenta');
            var url = '/venta-eliminar/'+data.id+'';

            formularioEliminarVenta.attr('action',url);

            $.confirm({
                animationBounce: 1.5,
                closeAnimation: 'scale',
                icon: 'fa fa-warning',
                title: 'Esta seguro que desea eliminar!',
                content: 'Esta Venta se eliminara de la base de datos',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Eliminar',
                        btnClass: 'btn-red',
                        action: function(){
                            $(".formEliminarVenta").submit();
                        }
                    },

                    cerrar: function () {
                    }
                }
            });
        });
        //Editar Venta
        $('.tablaVentas tbody').on('click','.editarVenta',function () {
            var data = tablaVentas.row($(this).parents('tr')).data();
            url = '/ventas/editar-ventas/'+data.id+'';
            $(this).attr('href',url);
        });

        //Editar Venta
        $('.tablaVentas tbody').on('click','.imprimirRecibo',function () {
            var data = tablaVentas.row($(this).parents('tr')).data();
            url = '/ventas/recibo/'+data.codigo+'';
            window.open(url);
        });

        //Rango de Fechas
        if (localStorage.getItem('capturarRango') != null){
            $('#daterange-btn span').html(localStorage.getItem('capturarRango'))
        }else{
            $('#daterange-btn span').html('<i class="fa fa-calendar"></i> Rango de Fecha')
        }
        


    </script>
@endsection
@stop

