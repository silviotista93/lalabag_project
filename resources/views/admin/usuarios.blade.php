@extends('admin.layout')

@section('header')
    <h1>
        Administrar Usuarios
        <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Usuarios</li>
        <li class="active">Administrar</li>
    </ol>
@stop

@section('contenido')
    <div class="box box-primary">
        <div class="box-header">
            <div class="form-group">
                <h3 class="box-title">Listado de Usuarios</h3>
                <button class="btn btn-primary pull-right" data-toggle="modal"
                        data-target="#modalAgregarUsuario">
                    <i class="fa fa-plus"></i> Crear Usuario
                </button>
            </div>
        </div>

        <div class="box-body table-responsive ">
            <table id="tabla_usuarios" class="table table-bordered table-striped " width="100%">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                    <th>Estado</th>

                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->apellidos}}</td>
                        <td>{{$usuario->roles->first()->name}}</td>
                        <td class="text-center">
                            <button href="#" class="btn btn-xs btn-default "><i class="fa fa-eye"></i></button>
                            <button class="btn btn-xs btn-info btnEditarUsuario" data-toggle="modal"
                                    data-target="#modalEditar"
                                    id="{{$usuario->id}}"
                                    nombre="{{$usuario->name}}"
                                    apellidos="{{$usuario->apellidos}}" email="{{$usuario->email}}"
                                    telefono="{{$usuario->telefono}}"
                                    editarRol="{{$usuario->roles->first()->id}}" href="#"><i
                                        class="fa fa-pencil"></i></button>
                            <form class="myform" action="{{route('usuarioEliminar',$usuario->id)}}" method="POST"
                                  style="display: inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <a idUsuario="{{$usuario->id}}" class="btn btn-xs btn-danger eliminar"><i
                                            class="fa fa-times"></i></a>
                            </form>
                        </td>
                        <td class="text-center">
                            @if($usuario->id !== auth()->user()->id)
                                <input class="cbEstado btn btn-danger btn-sm toggle-on" type="checkbox"
                                       {{ $usuario->estado === 'activo' ? 'checked':''}} data-toggle="toggle"
                                       data-size="small" data-id="{{ $usuario->id }}">
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form id="frmActualizarEstado" action="{{ route('actualizarEstado', ['__id__', '__estado__']) }}"
          method="post">
        @method('PUT')
        @csrf
    </form>


    <!-- MODAL AGREGAR USARIO -->
    <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"
                                style="color: #FFFFFF;">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Crear Usuario <i
                                class="fa fa-plus"></i></h4>
                </div>
                <form method="post" action="{{route ('usuarioCreado')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                                <label for="">Nombres</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Ingrese Nombres">
                                    {!! $errors->first('name','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('apellidos')? 'has-error':''}}">
                                <label for="">Apellidos</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="apellidos" class="form-control"
                                           placeholder="Ingrese Apellidos">
                                    {!! $errors->first('apellidos','<span class="help-block">*:message</span>')!!}
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
                                <label for="">Telefono</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="telefono" class="form-control"
                                           data-inputmask='"mask": "(999) 999-9999"'
                                           data-mask>
                                    {!! $errors->first('telefono','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('rol')? 'has-error':''}}">
                                <label for="">Seleccione Perfil</label>
                                <select name="rol" id="" class="form-control">
                                    <option value="">Seleccione Perfil</option>
                                    @foreach($roles as $rol)
                                        <option {{old('rol')==$rol->id ? 'selected': ''}} value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach

                                </select>
                                {!! $errors->first('rol','<span class="help-block">Seleccione Tipo</span>')!!}
                            </div>

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
                        <input type="hidden" name="foto" value="/adminlte/img/perfil.jpg" id="inputArchivoUsuario">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR USUARIO -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3c8dbc;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Editar Usuario <i
                                class="fa fa-pencil"></i></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <form method="post" id="form_actualizar_usuario" class="form-horizontal actualizarUsuario">
                            @csrf {{method_field('PUT')}}
                            <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                                <label for="">Nombres</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="name" type="text" name="name" class="form-control">
                                    {!! $errors->first('name','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('apellidos')? 'has-error':''}}">
                                <label for="">Apellidos</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="apellidos" type="text" name="apellidos" class="form-control">
                                    {!! $errors->first('apellidos','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" name="email" class="form-control"
                                           value="{{$usuario->email}}">
                                    {!! $errors->first('email','<span class="help-block">*:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('telefono')? 'has-error':''}}">
                                <label for="">Telefono</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" id="telefono" name="telefono" class="form-control"
                                           data-inputmask='"mask": "(999) 999-9999"'
                                           data-mask value="{{$usuario->telefono}}">
                                    {!! $errors->first('telefono','<span class="help-block">*:message</span>')!!}
                                </div>

                            </div>
                            <div class="form-group {{$errors->has('rol')? 'has-error':''}}">
                                {{--<select name="rol" id="" class="form-control">
                                    <option value="">Seleccione Perfil</option>

                                    @foreach($roles as $rol)
                                        <option id="editarRol" {{$usuario->roles->first()->id === $rol->id ? 'selected':''}}>{{$rol->name}}</option>
                                    @endforeach

                                </select>--}}
                                {!! $errors->first('rol','<span class="help-block">Seleccione Tipo</span>')!!}
                            </div>
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
                        </form>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a class="btn btn-primary edit">Actualizar</a>
                </div>
            </div>

        </div>
    </div>

@stop
@section('js')
    <script>
        //Money Euro
        $('[data-mask]').inputmask();

        $("#tabla_usuarios").DataTable({
            responsive: true,
            autoWidth :  false,
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


        @if(Request::url() === 'http://inventario.mauro/usuarios')

        @if (count($errors) > 0)
        $('#modalAgregarUsuario').modal('show');
        @endif
        @endif
    </script>

@endsection