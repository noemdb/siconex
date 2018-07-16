// script para realizar el borrado del registro
$('.btn-delete').click(function (e) {
    e.preventDefault();
    // r = confirm("Estas seguro de realizar esta acción?");
    if (confirm("Estas seguro de realizar esta acción?")) {
        var row = $(this).parents('tr'); //console.log(row); //fila contentiva de la data
        var id = row.data('rol');  //console.log(id);
        var form = $('#form-delete'); //console.log(form.attr('action'));
        var url = form.attr('action').replace(':ROL_ID',id); //console.log(url);
        var data = form.serialize(); //console.log(data);

        $.post(url, data, function (result){
            console.log(result.messenge);
            row.fadeOut();
            // row_info.fadeOut();
            var rol_counter = $("#rol_counter").text() - 1;
            $("#rol_counter").text(rol_counter);
            $("#msg_modal_admin_operok").text('Registro eliminado');
            $("#admin_operok").modal('show');
        }).fail(function () {
            // alert('El usuario no fué eliminado');
            $("#admin_oper_nook").modal('toggle');
            $.each(result.responseJSON.errors,function(index,valor){
                //console.log('Index: '+index+' - Valor: '+valor);
                $("#msg_"+index+"_"+id_profile).html(valor);
                $("#error_msg_"+index+"_"+id_profile).fadeIn();
            });                    
        });
    }
});//fin del evento clic