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
                <h3 class="box-title">Listado de Ventas</h3>
                <a href="{{route('crear-ventas')}}">
                    <button class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#modalAgregarCliente">
                        <i class="fa fa-plus"></i> Agregar Venta
                    </button>
                </a>
            </div>
        </div>

        <div class="box-body table-responsive ">
            <table class="table table-bordered table-striped dt-responsive tablas">
                <thead>
                <tr>
                    <th style="width:10px">#</th>
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

                <tbody>

                <tr>

                    <td>1</td>

                    <td>1000123</td>

                    <td>Juan Villegas</td>

                    <td>Julio Gómez</td>

                    <td>TC-12412425346</td>

                    <td>$ 1,000.00</td>

                    <td>$ 1,190.00</td>

                    <td>2017-12-11 12:05:32</td>

                    <td class="text-center">
                        <button class="btn btn-xs btn-success btnEditarUsuario" data-toggle="modal"><i class="fa fa-print"></i></button>
                        <a idUsuario="" class="btn btn-xs btn-danger eliminar"><i class="fa fa-times"></i></a>

                    </td>

                </tr>

                </tbody>

            </table>

        </div>

    </div>
@stop