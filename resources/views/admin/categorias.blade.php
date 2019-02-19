@extends('admin.layout')

@section('header')
    <h1>
        Administrar Categorías
        <small>Categorías</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categorias</li>
        <li class="active">Administrar</li>
    </ol>
@stop

@section('contenido')

    <div class="box box-primary">
        <div class="box-header">
            <div class="form-group">
                <h3 class="box-title">Listado de Categorías</h3>
                <button class="btn btn-primary pull-right" data-toggle="modal"
                        data-target="#modalAgregarCategoria">
                    <i class="fa fa-plus"></i> Crear Categoría
                </button>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table id="tabla_categorias" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Categoría</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @php( $no = 1)
                @foreach($categorias as $categoria)
                    <tr>

                        <td>{{$no++}}</td>
                        <td class="text-uppercase">{{$categoria->categoria}}</td>
                        <td class="text-center">
                            <button href="#" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-xs btn-info btnEditarCategoria" id="{{$categoria->id}}"
                                    categoria="{{$categoria->categoria}}" data-toggle="modal"
                                    data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                            <form class="myformCategoria" action="{{route('categoriaEliminar',$categoria->id)}}"
                                  method="POST" style="display: inline;">
                                @csrf
                                {{method_field('DELETE')}}

                                <a class="btn btn-xs btn-danger eliminarCategoria"><i class="fa fa-times"></i></a>

                            </form>

                        </td>


                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- MODAL AGREGAR CATEGORIA -->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Crear Categoría <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" action="{{route('categoriaCreada')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group {{$errors->has('categoria')? 'has-error':''}}">
                                <label for="">Nombre Categoria</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <input id="campo_nombre_categoria" type="text" name="categoria" class="form-control"
                                           placeholder="Nombre Categoria" autofocus>
                                    {!! $errors->first('categoria','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR CATEGORIA -->
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Editar Categoría <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" id="form_actualizar_categoria" class="form-horizontal actualizarCategoria">
                    @csrf {{method_field('PUT')}}

                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group {{$errors->has('categoria')? 'has-error':''}}">
                                <label for="">Nombre Categoria</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <input id="categoria" type="text" name="categoria" class="form-control"
                                           placeholder="Nombre Categoria" autofocus>
                                    {!! $errors->first('categoria','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary editCategoria">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('js')
    <script>
        @if(Request::url() === route('categorias'))

        @if (count($errors) > 0)
        $('#modalAgregarCategoria').modal('show');
        @endif
        @endif
        $("#tabla_categorias").DataTable({
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
        $('#tabla_sencilla').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,

        });
    </script>

@endsection
@stop



