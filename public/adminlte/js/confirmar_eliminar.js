$(".eliminar").click(function (){

    $.confirm({
        animationBounce: 1.5,
        closeAnimation: 'scale',
        icon: 'fa fa-warning',
        title: 'Esta seguro que desea eliminar!',
        content: 'Este Usuario se eliminara de la base de datos',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Eliminar',
                btnClass: 'btn-red',
                action: function(){
                    $(".myform").submit();
                }
            },

            cerrar: function () {
            }
        }
    });
});

$(".eliminarCategoria").click(function (){

    $.confirm({
        animationBounce: 1.5,
        closeAnimation: 'scale',
        icon: 'fa fa-warning',
        title: 'Esta seguro que desea eliminar!',
        content: 'Esta Categoria se eliminara de la base de datos',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Eliminar',
                btnClass: 'btn-red',
                action: function(){
                    $(".myformCategoria").submit();
                }
            },

            cerrar: function () {
            }
        }
    });
});

