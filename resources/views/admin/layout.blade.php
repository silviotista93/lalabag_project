<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{config('app.name')}} | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/adminlte/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="/adminlte/select2-4.0.3/dist/css/select2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Tablas -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">
    <link rel="stylesheet" href="/adminlte/bootstrap/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/adminlte/plugins/morris/morris.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/adminlte/css/toogle_button.css">
    <link rel="stylesheet" href="/adminlte/css/estilo_dropzone.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="/adminlte/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="/adminlte//css/skins/_all-skins.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    @stack("css")
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini
                |sidebar-collapse MINIMIZAR MENU
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>LL</b>B</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg" style="font-family:'Great Vibes', cursive;font-size: 30px !important;">Lala Bag</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="/adminlte/img/user2-160x160.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{auth()->user()->foto}}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{auth()->user()->roles->first()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{auth()->user()->foto}}" class="img-circle" alt="User Image">

                                <p>
                                    {{auth()->user()->name}} {{auth()->user()->apellidos}}
                                    - {{auth()->user()->roles->first()->name}}
                                    <small>Desde {{auth()->user()->created_at->format('d M Y')}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                        {{--<li class="user-body">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a href="#">Followers</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a href="#">Sales</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a href="#">Friends</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.row -->--}}
                        {{--</li>--}}
                        <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <button data-toggle="modal" data-target="#modalEditarPerfil" href="#"
                                            class="btn btn-default btn-flat">Profile
                                    </button>
                                </div>
                                <div class="pull-right">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{auth()->user()->foto}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{auth()->user()->name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
            {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
            {{--<span class="input-group-btn">--}}
            {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
            {{--</button>--}}
            {{--</span>--}}
            {{--</div>--}}s
        {{--</form>--}}
        <!-- /.search form -->

            <!-- Sidebar Menu -->
        @include('admin.partials.navegacion')
        <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <section class="content-header">
                @yield('header')
            </section>

        </section>

        <!-- Main content -->
        <section class="content">
            @if(session()->has('flash'))

                <div class="alert alert-success">{{session('flash')}}</div>

            @endif
            @if(session()->has('eliminar'))

                <div class="alert alert-danger">{{session('eliminar')}}</div>

            @endif
            @yield('contenido')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<!-- Modal EDITAR PERFIL -->
<div class="modal fade" id="modalEditarPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{route ('actualizarPerfil',auth()->user()->id)}}">
            @csrf {{method_field('PUT')}}
            <div class="modal-content">
                <div class="modal-header" style="background-color: #222D32;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                                                                                                      style="color: #FFFFFF">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF">Editar Perfil</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box box-widget widget-user">
                            <div class="widget-user-header bg-black"
                                 style="background: url('/adminlte/img/photo1.png') center center;">
                                <h3 class="widget-user-username">{{auth()->user()->name}} {{auth()->user()->apellidos}}</h3>
                                <h5 class="widget-user-desc">{{auth()->user()->roles->first()->name}}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="{{auth()->user()->foto}}" alt="User Avatar">
                            </div>
                            {{--<div class="box-footer">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-4 border-right">--}}
                            {{--<div class="description-block">--}}
                            {{--<h5 class="description-header">3,200</h5>--}}
                            {{--<span class="description-text">SALES</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--<div class="col-sm-4 border-right">--}}
                            {{--<div class="description-block">--}}
                            {{--<h5 class="description-header">13,000</h5>--}}
                            {{--<span class="description-text">FOLLOWERS</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--<div class="col-sm-4">--}}
                            {{--<div class="description-block">--}}
                            {{--<h5 class="description-header">35</h5>--}}
                            {{--<span class="description-text">PRODUCTS</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--</div>--}}
                            {{--<!-- /.row -->--}}
                            {{--</div>--}}
                        </div>
                        <!-- Cambio Contraseña-->

                        <div class="form-group"><h4>Cambiar Contraseña</h4></div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                   placeholder="Nueva Contraseña">
                            <span class="help-block">Dejar en blanco si no deseas cambiar la contraseña</span>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   id="exampleInputEmail1" placeholder="Repite Contraseña">

                        </div>
                        @if($errors->any())

                            <ul class="list-group">

                                @foreach($errors->all() as $error)

                                    <li class="list-group-item list-group-item-danger">

                                        {{$error}}
                                    </li>

                                @endforeach

                            </ul>

                    @endif
                        <!-- Cambio Foto-->
                        <div class="row justify-content-center">
                            <div class="col-md-6 justify-content-center">
                                <div class="form-group text-center">
                                    <h4>Actualiza tu foto de Perfil</h4>

                                        <div class="text-center dropzone dz-clickable" id="f_foto"  style="width: 100%; margin: auto;padding: 0px;">
                                            <div class="text-center dz-default dz-message" data-dz-message="">
                                                <span><img width="100%" src="/adminlte/img/fondo_perfil.png"></span>
                                            </div>
                                        </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
            <input type="hidden" name="foto" value="" id="inputFotoUsuario">
        </form>
    </div>
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/adminlte/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/adminlte/plugins/morris/morris.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/app.min.js"></script>
<script src="/adminlte/js/toogle_button.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="/adminlte/js/jqueryNumber.js"></script>

<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/adminlte/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="/adminlte/js/cambiar_estado.js"></script>
<script type="text/javascript" src="/adminlte/js/editarUsuarios.js"></script>
<script type="text/javascript" src="/adminlte/js/editarCategoria.js"></script>
<script type="text/javascript" src="/adminlte/js/confirmar_eliminar.js"></script>
<script type="text/javascript" src="/adminlte/js/tabla_productos.js"></script>
<script type="text/javascript" src="/adminlte/js/dataTables.js"></script>
<script type="text/javascript" src="/adminlte/js/codigo_productos.js"></script>
<script type="text/javascript" src="/adminlte/js/calculo_precio_venta.js"></script>
<script type="text/javascript" src="/adminlte/js/ventas.js"></script>
<script type="text/javascript" src="/adminlte/js/reportes.js"></script>
<script type="text/javascript" src="/adminlte/select2-4.0.3/dist/js/select2.js"></script>
<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="/adminlte/bootstrap/daterangepicker/moment.min.js"></script>
<script src="/adminlte/bootstrap/daterangepicker/daterangepicker.js"></script>

<script src="/adminlte/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/adminlte/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/js/demo.js"></script>


<script src="/adminlte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/adminlte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

@section('js')
<script>
    new Dropzone('.dropzone', {

        url:'{{route('fotoPerfil')}}',
        acceptedFiles: 'image/*',
        paramName: 'foto',
        maxFiles: 1,
        headers: {

            'X-CSRF-TOKEN': '{{csrf_token()}}'

        },
        success: function (file, response) {

            $('#inputFotoUsuario').val(response);
        }
    });
    Dropzone.autoDiscover = false;

    @if(Request::url() === 'http://inventario.mauro/dashboard')
        @if (count($errors) > 0)
        $('#modalEditarPerfil').modal('show');
        @endif
    @endif


        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });


</script>
@endsection

@section('js')

@show
@section('validacionProductos')

@show

@section('dataTablesProductos')

@show
@section('editarImagenProducto')

@show

@section('dataTablesVentas')

@show
@section('graficas')

@show
</body>
</html>
