<ul class="sidebar-menu">
    <li class="header">NAVEGACIÓN</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{request()->is('dashboard') ? 'class=active' : '' }}><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li {{request()->is('usuarios') ? 'class=active' : '' }}><a href="{{route('usuarios')}}"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
    <li {{request()->is('categorias') ? 'class=active' : '' }}><a href="{{route('categorias')}}"><i class="fa fa-th"></i> <span>Categorías</span></a></li>
    <li {{request()->is('productos') ? 'class=active' : '' }}><a href="{{route('productos')}}"><i class="fa fa-product-hunt"></i> <span>Productos</span></a></li>
    <li {{request()->is('clientes') ? 'class=active' : '' }}><a href="{{route('clientes')}}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
    <li class="treeview {{request()->is('ventas*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-list-ul"></i> <span>Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{request()->is('ventas/administrar-ventas') ? 'class=active' : '' }}><a href="{{route('adminis-ventas')}}"><i class="fa fa-circle-o"></i>Administrar Ventas</a></li>
{{--
            <li {{request()->is('ventas/crear-ventas') ? 'class=active' : '' }}><a href="{{route('crear-ventas')}}"><i class="fa fa-circle-o"></i>Crear Venta</a></li>
--}}
            <li {{request()->is('ventas/reportes-ventas') ? 'class=active' : '' }}><a href="{{route('reportes-ventas')}}"><i class="fa fa-circle-o"></i>Reporte de Ventas</a></li>
        </ul>
    </li>
</ul>