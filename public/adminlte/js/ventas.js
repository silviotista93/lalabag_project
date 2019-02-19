//ACTIVAR BOTONES CON SU ID CORRESPONDIENTE
$(function () {
    $('.tabla_producto_venta tbody').on('click', '.agregarVentaProducto', function (e) {
        if ($(this).hasClass('btn-default')) {
            return;
        }
        var data = table.row($(this).parents('tr')).data();

        var el = e.target;
        var classL = el.classList;
        classL.remove("btn-primary");
        classL.add('btn-default');

        $.get('/api/productoBuscar/' + data.id + '', function (respuesta) {
            var id = respuesta[0].id;
            var nombre = respuesta[0].nombre;
            var descripcion = respuesta[0].descripcion;
            var stock = respuesta[0].stock;
            var precio = respuesta[0].precio_venta;

            $(".nuevoProducto").append(
                '<div class="row" style="padding:5px 15px">' +

                '<!-- Descripción del producto -->' +

                '<div class="col-xs-6" style="padding-right:0px">' +

                '<div class="input-group">' +

                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" value="'+ id +'"><i class="fa fa-times"></i></button></span>' +

                '<input type="text" class="form-control nuevoNombreProducto" idProducto="'+id+'" name="agregarProducto" value="' + nombre + '" readonly required>' +
                '<input type="hidden" class="form-control nuevaDescripcionProducto" idProducto="'+id+'" name="agregarProducto2" value="' + descripcion +'" readonly required>' +

                '</div>' +

                '</div>' +

                '<!-- Cantidad del producto -->' +

                '<div class="col-xs-3">' +

                '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>' +

                '</div>' +

                '<!-- Precio del producto -->' +

                '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +

                '<div class="input-group">' +

                '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

                '<input type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" name="nuevoPrecioProducto" value="' + precio + '" readonly required>' +

                '</div>' +

                '</div>' +

                '</div>');
            //SUMAR TOTAL DE PRECIOS
            sumarTotalPrecios();
            agregarInpuesto();
            listarProductos()
            $('.nuevoPrecioProducto').number(true,2)
        });

    });
});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/
$(".formularioVenta").on("click", ".quitarProducto", function () {

    $(this).parent().parent().parent().parent().remove();

    var idProducto = $(this).val();

    var el = document.getElementById("btnAgregarVentaProducto"+idProducto);
    if (el) {
        var classL = el.classList;
        if (classL) {
            classL.add("btn-primary");
            classL.remove('btn-default');
        }
    }

    if($(".nuevoProducto").children().length == 0){

        $("#nuevoTotalVenta").val(0);
        $("#nuevoImpuestoVenta").val(0);
        $("#nuevoTotalVenta").attr('total',0);

    }else{
        //SUMAR EL TOTAL DE PRECIOS
        sumarTotalPrecios();
        agregarInpuesto();
        listarProductos();
    }

    /*if($(".nuevoProducto").children().length == 0){

        $("#nuevoImpuestoVenta").val(0);
        $("#nuevoTotalVenta").val(0);
        $("#totalVenta").val(0);
        $("#nuevoTotalVenta").attr("total",0);

    }else{

        // SUMAR TOTAL DE PRECIOS

        sumarTotalPrecios()

        // AGREGAR IMPUESTO

        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

    }*/

});

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTON PARA DISPOSITIVOS
=============================================*/

$('.btnAgregarProducto').click(function () {


    $.get('/api/todosProductos', function (respuesta) {

        var idProducto = respuesta.id;
        var nombre = respuesta.nombre;
        var descripcion = respuesta.descripcion;
        var stock = respuesta.stock;
        var precio = respuesta.precio_venta;

        $(".nuevoProducto").append(
            '<div class="row" style="padding:5px 15px">' +

            '<!-- Descripción del producto -->' +

            '<div class="col-xs-6" style="padding-right:0px">' +

            '<div class="input-group">' +

            '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto=""><i class="fa fa-times"></i></button></span>' +

            '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required id="">' +
            '' +
            '</select>' +

            '</div>' +

            '</div>' +

            '<!-- Cantidad del producto -->' +

            '<div class="col-xs-3 ingresoCantidad">' +

            '<input type="number" class="form-control nuevaCantidadProducto agregarProducto" name="nuevaCantidadProducto" min="1" value="1" stock="" nuevoStock="" required>' +

            '</div>' +

            '<!-- Precio del producto -->' +

            '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +

            '<div class="input-group">' +

            '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

            '<input type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" name="nuevoPrecioProducto" value="" readonly required>' +

            '</div>' +

            '</div>' +

            '</div>');

        //AGREGAR LOS PRODUCTOS AL SELECT
        var html_select = '<option value="">Seleccione Producto</option>';
        for (var i = 0; i < respuesta.length; ++i)
            html_select += '<option idproducto="' + respuesta[i].id + '" value="' + respuesta[i].id + '">' + respuesta[i].descripcion + '</option>';

        $('.nuevaDescripcionProducto').html(html_select);

        /*$('.nuevaDescripcionProducto').select2({

        });*/
        //SUMAR TOTAL DE PRECIOS
        sumarTotalPrecios();
        agregarInpuesto();

        $('.nuevoPrecioProducto').number(true,2)

    });

});

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/
$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function () {

    var idProducto = $(this).val();
    var nuevoPrecioProducto = $(this).parent().parent().parent().children('.ingresoPrecio').children().children('.nuevoPrecioProducto');
    var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");
    $.get('/api/productoBuscarDescripcion/'+idProducto+'', function (respuesta) {
        $(nuevaCantidadProducto).attr('stock', respuesta[0].stock);
        $(nuevaCantidadProducto).attr('nuevoStock', Number(respuesta[0].stock)-1);
        $(nuevoPrecioProducto).val(respuesta[0].precio_venta);
        $(nuevoPrecioProducto).attr('precioReal',respuesta[0].precio_venta);


        listarProductos();


    });

});

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioVenta").on("change", ".nuevaCantidadProducto", function(){

    var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

    var precioFinal = $(this).val() * precio.attr("precioReal");

    precio.val(precioFinal);
    var nuevoStock = Number($(this).attr('stock')) - $(this).val();

    $(this).attr('nuevoStock',nuevoStock);
    if (Number($(this).val()) > Number($(this).attr('stock'))){
        $(this).val(1);

        swal({
            title: "La Cantidad Supera el Stock",
            text: "Solo hay "+$(this).attr('stock')+" unidades!",
            icon: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }
    //SUMAR TOTAL DE PRECIOS
    sumarTotalPrecios();
    agregarInpuesto();
    listarProductos();
});

/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/
function sumarTotalPrecios() {

    var precioItem = $(".nuevoPrecioProducto");
    var arraySumaPrecio = [];

    for (var i = 0; i < precioItem.length; i++){
        arraySumaPrecio.push(Number($(precioItem[i]).val()));

    }
    function sumarArrayPrecios(total, numero) {

        return total + numero;
    }
    var sumaTotalPrecio = arraySumaPrecio.reduce(sumarArrayPrecios);
    console.log(sumaTotalPrecio);
    $("#nuevoTotalVenta").val(sumaTotalPrecio);
    $("#totalVentaDB").val(sumaTotalPrecio);
    $("#nuevoTotalVenta").attr('total',sumaTotalPrecio);

}

/*=============================================
FUNCION AGREGAR IMPUESTO
=============================================*/
function agregarInpuesto() {

  var inpuesto =  $('#nuevoImpuestoVenta').val();
  var precioTotal =  $("#nuevoTotalVenta").attr('total');

  var precioImpuesto = Number(precioTotal*inpuesto/100);
    var totalConInpuesto = Number(precioImpuesto) + Number(precioTotal);
    $("#nuevoTotalVenta").val(totalConInpuesto);
    $("#totalVentaDB").val(totalConInpuesto);
    $("#nuevoPrecioImpuesto").val(precioImpuesto);
    $("#nuevoPrecioNeto").val(precioTotal);
}

/*=============================================
CUANDO CAMBIE EL IMPUESTO
=============================================*/
$('#nuevoImpuestoVenta').change(function () {
    agregarInpuesto()
});

$('#nuevoTotalVenta').number(true,2);

/*=============================================
SELECCIONAR METODO DE PAGO
=============================================*/
$('#nuevoMetodoPago').change(function () {
    var metodo = $(this).val();

    if(metodo == "Efectivo"){
        $(this).parent().parent().removeClass('col-xs-6');
        $(this).parent().parent().addClass('col-xs-4');

        $(this).parent().parent().parent().children('.cajasMetodoPago').html(
            '<div class="col-xs-4">' +
            '   <div class="input-group">' +
            '       <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
            '           <input type="text" class="form-control nuevoValorEfectivo" name="nuevoValorEfectivo" placeholder="000000" required>' +
            '   </div>' +
            '</div>' +
            '<div class="col-xs-4 capturarCambioEfectivo" style="padding-left:0px">' +
            '   <div class="input-group">' +
            '       <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
            '           <input type="text" class="form-control nuevoCambioEfectivo" name="nuevoCambioEfectivo" placeholder="000000" required readonly >' +
            '   </div>' +
            '</div>'

        )
        //AGREGAR FORMATO AL PRECIO
        $('.nuevoValorEfectivo').number(true,2);
        $('.nuevoCambioEfectivo').number(true,2);
        //LISTAR METODO EN LA ENTRADA
        listarMetodos();
    }else{
        $(this).parent().parent().removeClass('col-xs-4');
        $(this).parent().parent().addClass('col-xs-6');

        $(this).parent().parent().parent().children('.cajasMetodoPago').html(
            '<div class="col-xs-6" style="padding-left:0px">\n' +
            '\n' +
            '                                    <div class="input-group">\n' +
            '\n' +
            '                                        <input type="text" class="form-control" id="nuevoCodigoTransaccion"\n' +
            '                                               name="nuevoCodigoTransaccion" placeholder="Código transacción" required>\n' +
            '\n' +
            '                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>\n' +
            '\n' +
            '                                    </div>\n' +
            '\n' +
            '                                </div>'
        )

    }
});

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".formularioVenta").on("change", ".nuevoValorEfectivo", function() {

    var efectivo = $(this).val();
    var cambio = Number(efectivo) - Number($('#nuevoTotalVenta').val());

    var nuevoCambioEfectivo = $(this).parent().parent().parent().children('.capturarCambioEfectivo').children().children('.nuevoCambioEfectivo');

    nuevoCambioEfectivo.val(cambio);
});
/*=============================================
CAMBIO EN TRANSACCION
=============================================*/
$(".formularioVenta").on("change", "#nuevoCodigoTransaccion", function() {

    listarMetodos();
});

/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/
function listarProductos() {
    var listarProductos = [];

    var nombre = $('.nuevoNombreProducto');
    var descripcion = $('.nuevaDescripcionProducto');
    var cantidad = $('.nuevaCantidadProducto');
    var precio =   $('.nuevoPrecioProducto');
    
    for (var i = 0; i < descripcion.length; i++){
        listarProductos.push({ "id":$(descripcion[i]).attr("idProducto"),
                               "nombre":$(nombre[i]).val(),
                               "descripcion":$(descripcion[i]).val(),
                               "cantidad":$(cantidad[i]).val(),
                               "stock":$(cantidad[i]).attr("nuevoStock"),
                               "precio":$(precio[i]).attr("precioReal"),
                               "total":$(precio[i]).val()})
    }
    $('#listaProductos').val(JSON.stringify(listarProductos));

}
/*=============================================
LISTAR METODO PAGO
=============================================*/

function listarMetodos() {

    var listaMetodos = "";
    if ($('#nuevoMetodoPago').val() == 'Efectivo'){

        $('#listaMetodoPago').val('Efectivo');
    }else {
        $('#listaMetodoPago').val($('#nuevoMetodoPago').val()+'-'+$('#nuevoCodigoTransaccion').val());
    }
    
}