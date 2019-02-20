@extends('admin.layout')

@section('header')
    <h1>
        Reportes de Ventas
        <small>Reportes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reportes</a></li>
        <li class="active">Administrar</li>
    </ol>
@stop

@section('contenido')
    <div class="box box-primary">
        <div class="box-header">
            <div class="form-group">
                <button type="button" class="btn btn-default pull-right" id="daterange-btn2">
                    <span><i class="fa fa-calendar"></i> Rango de Fecha</span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-solid bg-teal-gradient">
                        <div class="box-header">
                            <i class="fa fa-th">
                                <h3 class="box-title">Gráfico de Ventas</h3>
                            </i>
                        </div>
                        <div class="box-body border-radius-none nuevoGraficoVentas">
                            <div class="chart" id="line-chart-ventas" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Productos más vendidos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="150"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                                <li><i class="fa fa-circle-o text-green"></i> IE</li>
                                <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                                <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                                <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                                <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">United States of America
                                <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                        <li><a href="#">India <span class="pull-right text-green"><i
                                            class="fa fa-angle-up"></i> 4%</span></a>
                        </li>
                        <li><a href="#">China
                                <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                    </ul>
                </div>
                <!-- /.footer -->
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Vendedores</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart-vendedores" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Compradores</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart-compradores" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
@section('graficas')
    <script>

        var vendedores = new Morris.Bar({
            element: 'bar-chart-vendedores',
            resize: true,
            data: {!! json_encode($vendedores) !!},
            barColors: ['#00a65a', '#f56954'],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Ventas'],
            preUnits: '$',
            hideHover: 'auto'
        });

        var compradores = new Morris.Bar({
            element: 'bar-chart-compradores',
            resize: true,
            data: {!! json_encode($compradores) !!},
            barColors: ['#E1493F'],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Ventas'],
            preUnits: '$',
            hideHover: 'auto'
        });

        new Morris.Line({
            element: 'line-chart-ventas',
            resize: true,
            data: [
                {y: '2015', ventas: 2666},
                {y: '2016', ventas: 2778},
                {y: '2017', ventas: 4912},
                {y: '2018', ventas: 3767}
            ],
            xkey: 'y',
            ykeys: ['ventas'],
            labels: ['ventas'],
            lineColors: ['#efefef'],
            lineWidth: 2,
            hideHover: 'auto',
            gridTextColor: '#fff',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            pointStrokeColors: ['#efefef'],
            gridLineColor: '#efefef',
            gridTextFamily: 'Open Sans',
            preUnits: '$',
            gridTextSize: 10
        });

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: 700,
                color: "#f56954",
                highlight: "#f56954",
                label: "Chrome"
            },
            {
                value: 500,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "IE"
            },
            {
                value: 400,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "FireFox"
            },
            {
                value: 600,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Safari"
            },
            {
                value: 300,
                color: "#3c8dbc",
                highlight: "#3c8dbc",
                label: "Opera"
            },
            {
                value: 100,
                color: "#d2d6de",
                highlight: "#d2d6de",
                label: "Navigator"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=value %> <%=label%> users"
  };
  pieChart.Doughnut(PieData, pieOptions);


    </script>
@endsection
