//ACTIVAR BOTONES CON SU ID CORRESPONDIENTE
$('.tabla_producto_venta tbody').on('click','.agregarProducto',function () {
    var data = table.row( $(this).parents('tr') ).data();


    $(this).removeClass("btn-primary agregarProducto");
    $(this).addClass("btn-default");

    $.get('/api/productoBuscar/'+data.id+'',function (respuesta) {
        var idProducto = respuesta[0].id;
        var descripcion = respuesta[0].descripcion;
        var stock = respuesta[0].stock;
        var precio = respuesta[0].precio_venta;

        $(".nuevoProducto").append(

            '<div class="row" style="padding:5px 15px">'+

            '<!-- Descripción del producto -->'+

            '<div class="col-xs-6" style="padding-right:0px">'+

            '<div class="input-group">'+

            '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

            '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

            '</div>'+

            '</div>'+

            '<!-- Cantidad del producto -->'+

            '<div class="col-xs-3">'+

            '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'+stock+'" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

            '</div>' +

            '<!-- Precio del producto -->'+

            '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

            '<div class="input-group">'+

            '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

            '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+

            '</div>'+

            '</div>'+

            '</div>')
    });

});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/
$(".formularioVenta").on("click", ".quitarProducto", function(){

    $(this).parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");


    $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

    $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');






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