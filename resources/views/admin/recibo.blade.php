<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recibo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/adminlte/css/style.css">
</head>
<body onload="">
<div id="invoiceholder">
    <div id="invoice" class="effect2">

        <div id="invoice-top">
            <div class="logo"><img src="/adminlte/img/logo_inventario.png" width="5%" alt="Logo"/></div>
            <div style="display: inline-block; margin-left: -26px;">
                <h2 style="font-size: 27px;color: #444 !important;">Inventario</h2>
                <h3 style="font-size: 18px;padding-left: 31px;margin-top: -11px;font-weight: 500;color:#444"></h3>
            </div>
            <p style="display: inline-block; width: 553px;padding-left: 133px; text-align: center"><span style="font-size: 15px; font-weight: bold; color: #444;">Dirección.</span>
                Cra 18 No. 6-12 Cel.: 312 456 1254 - Tel.: 8432310 - Popayán NIT:12312412124 </p>


            <div class="title" style="margin-top: -94px">
                <h1 style="color: #d10000">Factura N.<span class="invoiceVal invoice_num">{{$obtenerDatos->codigo}}</span></h1>

                <p>Fecha: {{$obtenerDatos->created_at}}<span id="invoice_date"></span><br>
                </p>
            </div><!--End Title-->
        </div><!--End InvoiceTop-->

        <div id="invoice-mid">
            <div class="clearfix">
                <div class="col-left">
                    <div class="clientinfo">
                        <h2 id="supplier">Cliente</h2>
                    </div>
                </div>
                <div class="col-right">
                    <table class="table" style="width: 625px;">
                        <tbody>

                        <tr>
                            <td><span>Nombre:</span><label id="invoice_total">{{$obtenerDatos->ventas_cliente->nombre}}</label></td>
                            <td><span>Email:</span><label id="currency">{{$obtenerDatos->ventas_cliente->email}}</label></td>
                        </tr>
                        <tr>
                            <td><span>Indentificación:</span><label id="payment_term">{{$obtenerDatos->ventas_cliente->documento}}</label></td>
                            <td><span>Telefono:</span><label id="invoice_type">{{$obtenerDatos->ventas_cliente->telefono}}</label></td>
                        </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div><!--End Invoice Mid-->

        <div id="invoice-bot">


            <div id="table">
                <table class="table-main" style="margin-left: 7px">
                    <thead>
                    <tr class="tabletitle">
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Valor Unit.</th>
                        <th>Valor Total</th>
                    </tr>
                    @php($listaProducto = json_decode($obtenerDatos->productos,true))

                    </thead>
                        @foreach($listaProducto as $listaProductos)
                        <tr class="list-item">
                            <td data-label="Type" class="tableitem">{{$listaProductos['cantidad']}}</td>
                            <td data-label="Description" class="tableitem">
                                {{$listaProductos['nombre']}}
                            </td>
                            <td data-label="Unit Price" class="tableitem">$ {{$listaProductos['precio']}}</td>
                            <td data-label="Taxable Amount" class="tableitem">$ {{$listaProductos['total']}}</td>
                        </tr>
                        @endforeach

                    <tr class="list-item total-row">
                        <th colspan="3" class="tableitem"> Neto:</th>
                        <td data-label="Grand Total" class="tableitem">$ {{$obtenerDatos->neto}}</td>
                    </tr>
                    <tr class="list-item total-row">
                        <th colspan="3" class="tableitem"> Impuesto:</th>
                        <td data-label="Grand Total" class="tableitem">$ {{$obtenerDatos->impuesto}}</td>
                    </tr>
                    <tr class="list-item total-row">
                        <th colspan="3" class="tableitem"> Total:</th>
                        <td data-label="Grand Total" class="tableitem">$ {{$obtenerDatos->total}}</td>
                    </tr>
                </table>

            </div><!--End Table-->
            <div class="cta-group" style="margin-left: 11px;">
                <h2>Observaciones:</h2>
                <p>
                        Ninguna Observación..

                    </p>
            </div>

        </div><!--End InvoiceBot-->
        <footer>
            <div id="legalcopy" class="clearfix">

            </div>
        </footer>
    </div><!--End Invoice-->
</div><!-- End Invoice Holder-->


</body>
</html>
