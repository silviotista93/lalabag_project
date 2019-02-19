$(function () {
    $("#tabla-usuarios").DataTable({"ordering": false});
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    //Money Euro
    $('[data-mask]').inputmask();
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });


    if (window.location.hash ==='#categorias'){

        $('#modalAgregarCategoria').modal('show');
    }
    $('#modalAgregarCategoria').on('hide.bs.modal', function(){
        window.location.hash = '#';
    })
    $('#modalAgregarCategoria').on('shown.bs.modal', function(){
        $('#campo_nombre_categoria').focus();
        window.location.hash = '#categorias';
    })

});