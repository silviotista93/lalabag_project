$(document).on('click','.btnEditarCategoria',function () {

    var id = $(this).attr('id');
    $('#categoria').val($(this).attr('categoria'));
    console.log(id,'id');
    var url ='/categoria-update/'+id;


    $('#form_actualizar_categoria').attr('action',url);

    $('.editCategoria').click(function () {

        $(".actualizarCategoria").submit();
    })


});