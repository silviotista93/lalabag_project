$(document).on('click','.btnEditarUsuario',function(){

    var id = $(this).attr('id');
    console.log(id, 'id');
    $('#name').val($(this).attr('nombre'));
    $('#apellidos').val($(this).attr('apellidos'));
    $('#email').val($(this).attr('email'));
    $('#telefono').val($(this).attr('telefono'));

    var url ='http://inventario.mauro/usuario-update/'+id;

    console.log(url,'url');

    $('#form_actualizar_usuario').attr('action',url);

    $('.edit').click(function () {

        $(".actualizarUsuario").submit();
    })


});

