$('#precioCompra,#editarPrecioCompra').change(function () {


        var valorPorcentaje = $('.nuevoPorcentaje').val();

        var porcentaje = Number(($('#precioCompra').val()*valorPorcentaje/100))+Number($('#precioCompra').val());
        var editarPorcentaje = Number(($('#editarPrecioCompra').val()*valorPorcentaje/100))+Number($('#editarPrecioVenta').val());

        $('#precioVenta').val(porcentaje);
        $('#precioVenta').prop('readonly',true);

        $('#editarPrecioVenta').val(editarPorcentaje);
        $('#editarPrecioVenta').prop('readonly',true);

})
$(".nuevoPorcentaje").change(function(){



        var valorPorcentaje = $(this).val();

        var porcentaje = Number(($("#precioCompra").val()*valorPorcentaje/100))+Number($("#precioCompra").val());

        var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

        $("#precioVenta").val(porcentaje);
        $("#precioVenta").prop("readonly",true);

        $("#editarPrecioVenta").val(editarPorcentaje);
        $("#editarPrecioVenta").prop("readonly",true);


})

/*
//CAMBIO DE PORCENTAJE
$(".porcentaje").on("ifUnchecked",function(){

    $("#precioVenta").prop("readonly",false);

})

$(".porcentaje").on("ifChecked",function(){

    $("#precioVenta").prop("readonly",true);


})

*/



