$(function () {
    $('#id_categoria').on('change',onSelectTipoCategoria)
});
function onSelectTipoCategoria() {

    var tipoCategoria_id = $(this).val();


    //AJAX

    $.get('/api/idCategorias/'+tipoCategoria_id+'/todos',function (data) {
        if (data == false) {
            var nuevoCodigo = tipoCategoria_id+"01";
            $('#nuevoCodigo').val(nuevoCodigo);
        }else{
            var nuevoCodigo = Number(data[0].codigo)+1;
            $('#nuevoCodigo').val(nuevoCodigo);
        }

    });


}